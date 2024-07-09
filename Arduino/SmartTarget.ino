  #include <Wire.h>
  #include <VL53L1X.h>
  #include "HX711.h"
  #include <WiFi.h>

  const char *ssid = "Satu23";
  const char *password = "1DuaTiga";
  const char *host = "192.168.86.37";
  const int port = 3000;

  const int LED_PIN = 4;

  // VL53L1X Sensor Constants
  VL53L1X sensor;
  unsigned long previousMillis = 0;
  const long interval = 25;
  uint16_t previousDistance_mm = 0;
  unsigned long previousTime = 0;
  // SDA to 21
  // SCL to 22
  
  // Load Cell Constants
  const int LOADCELL_DOUT_PIN = 32;
  const int LOADCELL_SCK_PIN = 33;
  HX711 scale;
  unsigned long previousLoadCellMillis = 0;
  const long loadCellInterval = 100;

  // Variables for timing
  unsigned long startTime;
  float highestSpeed = 0;
  float highestLoad = 0;



  WiFiClient client;


  void setup() {
    Serial.begin(115200);
    Wire.begin();
    pinMode(LED_PIN, OUTPUT); // Set the LED pin as output

    // Connect to WiFi
    Serial.printf("Connecting to %s ", ssid);
    WiFi.begin(ssid, password);
    while (WiFi.status() != WL_CONNECTED) {
      delay(500);
      Serial.print(".");
    }
    Serial.println("Connected");

    // VL53L1X Sensor Setup
    if (!sensor.init()) {
      Serial.println("Failed to detect and initialize ToF sensor!");
      while (1);
    }
    sensor.setROISize(4, 4);
    sensor.setTimeout(500);
    sensor.setMeasurementTimingBudget(25000);
    sensor.startContinuous(50);

    // Load Cell Setup
    scale.begin(LOADCELL_DOUT_PIN, LOADCELL_SCK_PIN);
    scale.tare(); // Zero the scale
    float calibrationFactor = 7000; // Use the calibration factor from the second snippet
    scale.set_scale(calibrationFactor);

    startTime = millis(); // Initialize start time
  }

  void loop() {
    unsigned long currentMillis = millis();

    // VL53L1X Sensor Measurement
    if (currentMillis - previousMillis >= interval) {
      previousMillis = currentMillis;
      measureTOFSensor();
    }

    // Load Cell Measurement
    if (currentMillis - previousLoadCellMillis >= loadCellInterval) {
      previousLoadCellMillis = currentMillis;
      measureLoadCell();
    }

    // Calculate Power if the 2-second window has elapsed
    if (currentMillis - startTime >= 2000) {
      calculatePower();
      // Reset for the next cycle
      highestSpeed = 0;
      highestLoad = 0;
      startTime = millis();
    }
  }

  void measureTOFSensor() {
    uint16_t currentDistance_mm = sensor.read()+10;  // Read the distance in millimeters

    if (currentDistance_mm != 0 && currentDistance_mm <= 1000) {  // Ensure distance is within range
      float currentDistance_cm = currentDistance_mm / 10.0;       // Convert mm to cm

      float timeDifference = (millis() - previousTime) / 1000.0;  // Time difference in seconds
      float speed_cm_s = 0;  // Speed in cm/s

      if (previousTime != 0 && timeDifference > 0) {  // Ensure this isn't the first measurement
        speed_cm_s = (currentDistance_cm - (previousDistance_mm / 10.0)) / timeDifference;
      }

      // Convert speed to m/s
      float speed_m_s = speed_cm_s / -100.0;

      // Update for next calculation
      previousDistance_mm = currentDistance_mm;
      previousTime = millis();

      if (speed_m_s > highestSpeed) {
        highestSpeed = speed_m_s; // Update highest speed if current speed is greater
      }

      Serial.print("Distance (cm): ");
      Serial.print(currentDistance_cm);
      Serial.print(", Speed (m/s): ");
      Serial.println(speed_m_s, 2);  // Print speed with 2 decimal places
    } else {
      Serial.println("Out of range or measurement error.");
    }
  }

  void measureLoadCell() {
    if (scale.is_ready()) {
      float weight = scale.get_units(); // This will use the updated calibration factor
      
      if (weight > highestLoad) {
        highestLoad = weight;
      }
      
      Serial.print("Load Cell Weight: ");
      Serial.println(weight, 2); // Print the weight with two decimal places
    } else {
      Serial.println("Load Cell HX711 not ready");
    }
  }

  void calculatePower() {
    float power = highestLoad * highestSpeed; // Calculate power
    
    Serial.print("Power: ");
    Serial.println(power, 2);
    
    // Calculate power and then blink LED for 0.5 second
    if (power >= 1.0) {
      // Attempt to connect to the server and send data
      if (!client.connect(host, port)) {
        Serial.println("Connection to host failed");
        return;
      }

      // Send the data to the server
      String jsonData = "{\"power\":" + String(power, 2) + 
                    ",\"highestLoad\":" + String(highestLoad, 2) + 
                    ",\"highestSpeed\":" + String(highestSpeed, 2) + "}";

  client.println("POST /power HTTP/1.1");
  client.println("Host: " + String(host));
  client.println("Content-Type: application/json");
  client.print("Content-Length: ");
  client.println(jsonData.length());
  client.println();
  client.println(jsonData);

      
      // Close the HTTP header
      client.println();

      Serial.println("Data sent successfully");

      // Close the connection
      client.stop();
    } else {
      Serial.println("Power is below 1, not sending data.");
    }

    // LED Blink for 0.5 second after power calculation
    digitalWrite(LED_PIN, HIGH); // Turn LED on
    delay(300); // Wait for 0.3 second
    digitalWrite(LED_PIN, LOW); // Turn LED off

    // Reset the measurement for the next cycle
    highestSpeed = 0;
    highestLoad = 0;
    startTime = millis(); // Reset the timer for the next power calculation
  }
