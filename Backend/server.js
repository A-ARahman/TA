const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const mysql = require('mysql2');

// Set up a connection pool to the MySQL database
const pool = mysql.createPool({
  host: 'localhost',
  user: 'root',
  password: '', // Replace with your MySQL password
  database: 'ta_smarttarget', // Replace with your database name
  waitForConnections: true,
  connectionLimit: 10,
  queueLimit: 0
});

const app = express();
const port = 3000;

let activeUserId; // Global variable to store the active user ID

// CORS configuration
const corsOptions = {
  origin: 'http://localhost', // Replace with the exact URL of your frontend application
  credentials: true,
  methods: ['GET', 'POST', 'OPTIONS'],
};

app.use(cors(corsOptions));
app.options('*', cors(corsOptions)); // Enable pre-flight requests for all routes
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Set active user endpoint
app.post('/set_active_user', (req, res) => {
  activeUserId = req.body.userId;
  console.log(`Active user set to ${activeUserId}`);
  res.json({ message: `Active user set to ${activeUserId}` }); // Ensure JSON response
});

// Insert power data endpoint
app.post('/power', (req, res) => {
  const { power, highestLoad, highestSpeed } = req.body;

  // Log the received data for debugging
  console.log('Data received:', req.body);

  // Validate the received data
  if (!activeUserId) {
    console.error('No active user has been set.');
    return res.status(400).send('No active user has been set.');
  }
  if (power === undefined || highestLoad === undefined || highestSpeed === undefined) {
    console.error('One or more required fields are missing.');
    return res.status(400).send('One or more required fields are missing.');
  }

  // Perform the database insert operation
  pool.execute(
    'INSERT INTO data_st (user_id, power, highest_load, highest_speed, timestamp) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)',
    [activeUserId, power, highestLoad, highestSpeed],
    (error, results) => {
      if (error) {
        console.error('Error inserting data:', error);
        return res.status(500).send('Error inserting data into the database.');
      }
      console.log(`Data inserted with ID: ${results.insertId}`);
      res.status(201).send(`Data inserted with ID: ${results.insertId}`);
    }
  );
});

// Endpoint to fetch metrics based on the active user
app.get('/metrics', async (req, res) => {
  
    if (!req.query.userId) {
        res.status(400).send("userId parameter is required");
        return;
    }

  try {
    // Fetch the last 20 entries for the active user
    const lastTwentyQuery = `
    SELECT power, highest_load, highest_speed, timestamp
    FROM (
        SELECT power, highest_load, highest_speed, timestamp
        FROM data_st
        WHERE user_id = ?
        ORDER BY timestamp DESC
        LIMIT 20
    ) AS subquery
    ORDER BY timestamp DESC;
    `;


    // Fetch the latest entry for the active user
    const latestQuery = `
      SELECT power, highest_load, highest_speed, timestamp
      FROM data_st
      WHERE user_id = ?
      ORDER BY timestamp DESC
      LIMIT 1
    `;

    // Fetch the highest values for each metric for the active user
    const highestQuery = `
    SELECT 
      MAX(power) AS max_power, 
      MAX(highest_load) AS max_load, 
      MAX(highest_speed) AS max_speed
    FROM (
      SELECT power, highest_load, highest_speed
      FROM data_st
      WHERE user_id = ?
      ORDER BY timestamp DESC
      LIMIT 20
    ) AS recent_entries
  `;
  
    const averagesQuery = `
            SELECT AVG(power) AS avg_power, AVG(highest_load) AS avg_load, AVG(highest_speed) AS avg_speed
            FROM (
                SELECT power, highest_load, highest_speed
                FROM data_st
                WHERE user_id = ?
                ORDER BY timestamp DESC
                LIMIT 20
            ) AS subquery;
        `;

    
    ;

    // Execute the queries using the active user ID
    const [lastTwentyResults] = await pool.promise().query(lastTwentyQuery, [activeUserId]);
    const [latestResults] = await pool.promise().query(latestQuery, [activeUserId]);
    const [highestResults] = await pool.promise().query(highestQuery, [activeUserId]);
    const [averagesResults] = await pool.promise().query(averagesQuery, [activeUserId]);

    // Respond with the fetched data
    res.json({
      lastTwenty: lastTwentyResults,
      latest: latestResults[0],
      highest: highestResults[0],
      averages: averagesResults[0] 
    });
  } catch (error) {
    console.error('Error fetching metrics:', error);
    res.status(500).send('Error fetching metrics from the database.');
  }
});


// Endpoint to fetch dashboard metrics
app.get('/dashboard_metrics', async (req, res) => {
  try {
      const highestMetricsSql = `
          SELECT u.user_id, u.name, MAX(d.power) AS max_power, MAX(d.highest_load) AS max_load, MAX(d.highest_speed) AS max_speed
          FROM data_st d
          JOIN users_st u ON d.user_id = u.user_id
          GROUP BY d.user_id
          ORDER BY max_power DESC, max_load DESC, max_speed DESC
      `;

      const [metrics] = await pool.promise().query(highestMetricsSql);

      const rankings = metrics.map((item, index) => ({
          rank: index + 1,
          userId: item.user_id,
          name: item.name,
          power: item.max_power,
          load: item.max_load,
          speed: item.max_speed
      }));

      res.json({ rankings });
  } catch (error) {
      console.error('Error fetching dashboard metrics:', error);
      res.status(500).send('Error fetching metrics from the database.');
  }
});

app.get('/highest_metrics', async (req, res) => {
  try {
      const highestValuesSql = `
          SELECT 
              MAX(power) AS max_power, 
              MAX(highest_load) AS max_load, 
              MAX(highest_speed) AS max_speed
          FROM data_st;
      `;

      const [results] = await pool.promise().query(highestValuesSql);
      const highestValues = results[0];

      res.json({
          maxPower: highestValues.max_power,
          maxLoad: highestValues.max_load,
          maxSpeed: highestValues.max_speed
      });
  } catch (error) {
      console.error('Error fetching highest metrics:', error);
      res.status(500).send('Error fetching highest metrics from the database.');
  }
});

// Start the server
app.listen(port, () => {
  console.log(`Server running on port ${port}`);
});
