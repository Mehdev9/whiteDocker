<!-- filepath: c:\Users\Mehdi\whiteDocker\resources\views\welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docker Manager</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            text-align: center;
            color: white;
            padding: 40px;
        }
        h1 {
            font-size: 4rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.5rem;
            margin-bottom: 40px;
            opacity: 0.9;
        }
        .btn {
            display: inline-block;
            padding: 15px 40px;
            background: white;
            color: #667eea;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            font-size: 1.1rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }
        .features {
            margin-top: 60px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        .feature {
            background: rgba(255,255,255,0.1);
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }
        .feature h3 {
            margin-bottom: 10px;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🐳 Docker Manager</h1>
        <p>Simple Docker Management Interface</p>
        <a href="/docker/info" class="btn">View Docker Info</a>
        
        <div class="features">
            <div class="feature">
                <h3>📊 Monitor</h3>
                <p>Track containers and images</p>
            </div>
            <div class="feature">
                <h3>🚀 Deploy</h3>
                <p>Manage your containers</p>
            </div>
            <div class="feature">
                <h3>💾 Resources</h3>
                <p>View system information</p>
            </div>
        </div>
    </div>
</body>
</html>