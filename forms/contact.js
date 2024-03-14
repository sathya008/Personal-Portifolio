// api/contact.js

const { parse } = require('url');
const { exec } = require('child_process');

module.exports = async (req, res) => {
  const { pathname, query } = parse(req.url, true);
  
  if (pathname === '/forms/contact.php') {
    // Run the PHP script using the child_process module
    exec('php forms/contact.php', (error, stdout, stderr) => {
      if (error) {
        console.error(`exec error: ${error}`);
        return;
      }
      console.log(`stdout: ${stdout}`);
      console.error(`stderr: ${stderr}`);
      res.statusCode = 200;
      res.setHeader('Content-Type', 'text/html');
      res.end(stdout);
    });
  } else {
    res.statusCode = 404;
    res.end('Not Found');
  }
};
