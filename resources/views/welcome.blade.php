<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'StagePass') }} API</title>
            <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #172455 0%, #1e3a8a 100%);
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            text-align: center;
            max-width: 600px;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 800;
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .message {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            line-height: 1.6;
            opacity: 0.9;
        }
        .api-link {
            display: inline-block;
            margin-top: 2rem;
            padding: 1rem 2rem;
            background: rgba(251, 191, 36, 0.2);
            border: 2px solid #fbbf24;
            border-radius: 8px;
            color: #fbbf24;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }
        .api-link:hover {
            background: rgba(251, 191, 36, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(251, 191, 36, 0.3);
        }
        .tech-message {
            font-size: 0.9rem;
            margin-top: 1rem;
            opacity: 0.7;
            font-style: italic;
        }
        .emoji {
            font-size: 4rem;
            margin-bottom: 1rem;
            display: block;
        }
            </style>
    </head>
<body>
    <div class="container">
        <span class="emoji">🎤✨</span>
        <h1>StagePass API</h1>
        <p class="message">
            Our API is running smoother than a perfectly mixed soundboard! 🎚️<br>
            No static, no feedback, just pure digital harmony.
        </p>
        <a href="https://api.stagepass.co.ke/api/test" class="api-link" target="_blank">
            Test API Endpoints →
        </a>
        <p class="tech-message">
            * Returns 200 OK if endpoints are accessible. Status: All systems operational! 🚀
        </p>
        </div>
    </body>
</html>
