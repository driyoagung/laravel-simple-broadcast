<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $emailSubject }}</title>
    <style type="text/css">
        body,
        html {
            margin: 0 !important;
            padding: 0 !important;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #1a202c;
            width: 100% !important;
            background-color: #f7fafc;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
        }

        /* Header dengan style minimal modern */
        .header {
            background: #2d3748;
            color: white;
            padding: 35px 40px;
            text-align: center;
            border-bottom: 3px solid #4a5568;
        }

        .header h1 {
            margin: 0 0 8px 0;
            font-size: 26px;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        .header p {
            margin: 0;
            font-size: 14px;
            opacity: 0.85;
            font-weight: 400;
        }

        .content {
            padding: 45px 40px;
        }

        .greeting {
            font-size: 16px;
            margin-bottom: 25px;
            color: #4a5568;
            font-weight: 500;
        }

        .subject {
            color: #2d3748;
            font-size: 22px;
            font-weight: 600;
            margin: 0 0 30px 0;
            line-height: 1.4;
            letter-spacing: -0.3px;
        }

        .message-content {
            background: #f8fafc;
            padding: 30px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            border-left: 3px solid #4a5568;
            font-size: 15px;
            line-height: 1.75;
            color: #4a5568;
            white-space: pre-line;
        }

        .footer {
            background: #f8fafc;
            padding: 30px 40px;
            text-align: center;
            font-size: 13px;
            color: #718096;
            border-top: 1px solid #e2e8f0;
        }

        .footer p {
            margin: 8px 0;
            line-height: 1.6;
        }

        .app-name {
            font-weight: 600;
            color: #2d3748;
        }

        .footer-note {
            font-size: 12px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            color: #a0aec0;
        }

        @media only screen and (max-width: 600px) {
            .container {
                margin: 20px 10px;
                border-radius: 8px;
            }

            .header {
                padding: 30px 25px;
            }

            .content {
                padding: 35px 25px;
            }

            .footer {
                padding: 25px 25px;
            }

            .header h1 {
                font-size: 22px;
            }

            .subject {
                font-size: 19px;
            }

            .message-content {
                padding: 25px 20px;
            }
        }

        .button {
            display: inline-block;
            padding: 14px 32px;
            background: #2d3748;
            color: white !important;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            margin: 25px 0;
            transition: background 0.2s ease;
        }

        .button:hover {
            background: #1a202c;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>{{ config('app.name', 'Test Broadcast') }}</h1>
            <p>Pesan Broadcast Resmi</p>
        </div>

        <div class="content">
            <div class="greeting">
                <strong>Halo!</strong>
            </div>

            <h2 class="subject">{{ $emailSubject }}</h2>

            <div class="message-content">
                {{ $emailContent }}
            </div>

            @if (strpos(strtolower($emailContent), 'login') !== false || strpos(strtolower($emailContent), 'website') !== false)
                <div style="text-align: center; margin-top: 30px;">
                    <a href="{{ config('app.url', 'http://localhost:8000') }}" class="button"
                        style="color: white; text-decoration: none;">
                        Kunjungi Website
                    </a>
                </div>
            @endif
        </div>

        <div class="footer">
            <p><span class="app-name">{{ config('app.name', 'Test Broadcast') }}</span> - Sistem Informasi Broadcast</p>
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Test Broadcast') }}. All rights reserved.</p>
            <div class="footer-note">
                Email ini dikirim secara otomatis. Mohon tidak membalas email ini.<br>
                Jika Anda memiliki pertanyaan, silakan hubungi administrator sistem.
            </div>
        </div>
    </div>
</body>

</html>
