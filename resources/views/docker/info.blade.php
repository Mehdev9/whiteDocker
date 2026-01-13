<!-- filepath: c:\Users\Mehdi\whiteDocker\resources\views\docker\info.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docker Info</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
        .header h1 {
            font-size: 2.5rem;
        }
        .back-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 25px;
            background: white;
            color: #667eea;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .stat-card h3 {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        .stat-card .value {
            font-size: 2rem;
            font-weight: bold;
            color: #667eea;
        }
        .section {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .section h2 {
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #667eea;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background: #667eea;
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }
        tr:hover {
            background: #f8f9fa;
        }
        .error {
            background: #fee;
            color: #c33;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #c33;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🐳 Docker Information</h1>
        <p>{{ $dockerInfo['version'] }}</p>
        <a href="/" class="back-btn">← Back to Home</a>
    </div>

    @if(isset($dockerInfo['error']))
        <div class="section">
            <div class="error">{{ $dockerInfo['error'] }}</div>
        </div>
    @endif

    @if($dockerInfo['info'])
        <div class="stats">
            @if(isset($dockerInfo['info']['Containers']))
                <div class="stat-card">
                    <h3>Total Containers</h3>
                    <div class="value">{{ $dockerInfo['info']['Containers'] }}</div>
                </div>
            @endif
            @if(isset($dockerInfo['info']['ContainersRunning']))
                <div class="stat-card">
                    <h3>Running</h3>
                    <div class="value" style="color: #27ae60;">{{ $dockerInfo['info']['ContainersRunning'] }}</div>
                </div>
            @endif
            @if(isset($dockerInfo['info']['ContainersStopped']))
                <div class="stat-card">
                    <h3>Stopped</h3>
                    <div class="value" style="color: #e74c3c;">{{ $dockerInfo['info']['ContainersStopped'] }}</div>
                </div>
            @endif
            @if(isset($dockerInfo['info']['Images']))
                <div class="stat-card">
                    <h3>Images</h3>
                    <div class="value">{{ $dockerInfo['info']['Images'] }}</div>
                </div>
            @endif
        </div>
    @endif

    @if(count($dockerInfo['containers']) > 0)
        <div class="section">
            <h2>Running Containers</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dockerInfo['containers'] as $container)
                        <tr>
                            <td>{{ substr($container['ID'] ?? '', 0, 12) }}</td>
                            <td>{{ $container['Image'] ?? 'N/A' }}</td>
                            <td>{{ $container['Names'] ?? 'N/A' }}</td>
                            <td>{{ $container['Status'] ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if(count($dockerInfo['images']) > 0)
        <div class="section">
            <h2>Docker Images</h2>
            <table>
                <thead>
                    <tr>
                        <th>Repository</th>
                        <th>Tag</th>
                        <th>ID</th>
                        <th>Size</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dockerInfo['images'] as $image)
                        <tr>
                            <td>{{ $image['Repository'] ?? 'N/A' }}</td>
                            <td>{{ $image['Tag'] ?? 'N/A' }}</td>
                            <td>{{ substr($image['ID'] ?? '', 0, 12) }}</td>
                            <td>{{ $image['Size'] ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</body>
</html>