const http = require('http');
const fs = require('fs');
const path = require('path');

// Usar puerto específico que Railway permita
const port = process.env.PORT || 3000;

console.log(`Starting server on port: ${port}`);
console.log(`Environment variables:`, process.env);

const server = http.createServer((req, res) => {
    console.log(`Request: ${req.method} ${req.url}`);
    
    if (req.url === '/' || req.url === '/index.html') {
        // Servir tu aplicación PHP como HTML estático
        const html = `
<!DOCTYPE html>
<html>
<head>
    <title>TODO List</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>TODO List - Funcionando en Railway</h1>
    <p>¡El servidor Node.js está funcionando correctamente!</p>
    <p>Puerto: ${port}</p>
    <p>Timestamp: ${new Date().toISOString()}</p>
</body>
</html>`;
        
        res.writeHead(200, { 'Content-Type': 'text/html' });
        res.end(html);
    } else if (req.url === '/favicon.ico') {
        res.writeHead(404);
        res.end();
    } else {
        res.writeHead(404, { 'Content-Type': 'text/plain' });
        res.end('Not Found');
    }
});

server.listen(port, '0.0.0.0', () => {
    console.log(`Server running on port ${port}`);
    console.log(`Environment: ${process.env.NODE_ENV || 'development'}`);
});
