// forms/contact.js

const { exec } = require('child_process');

module.exports = async (req, res) => {
  // Execute the PHP script
  exec('php forms/contact.php', (error, stdout, stderr) => {
    if (error) {
      console.error(`exec error: ${error}`);
      res.statusCode = 500;
      res.setHeader('Content-Type', 'text/plain');
      res.end('Internal Server Error');
      return;
    }
    console.log(`stdout: ${stdout}`);
    console.error(`stderr: ${stderr}`);
    res.statusCode = 200;
    res.setHeader('Content-Type', 'text/html');
    res.end(stdout);
  });
};
