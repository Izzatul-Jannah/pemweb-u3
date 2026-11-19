<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Portal Berita') - Portal Berita</title>
    <style>
        :root {
            --bg-page: #f4f8fc;
            --bg-surface: #ffffff;
            --bg-soft-blue: #eaf3fc;
            --bg-soft-blue-hover: #d8ebfa;
            --border-soft: #cfe0f2;
            --text-main: #1e293b;
            --text-muted: #5b6b82;
            --primary: #3b82f6;
            --primary-dark: #1d4ed8;
            --success-bg: #e7f6ee;
            --success-border: #b6e3c8;
            --success-text: #166534;
            --error-bg: #fdecec;
            --error-border: #f5c2c2;
            --error-text: #991b1b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: var(--bg-page);
            color: var(--text-main);
            max-width: 980px;
            margin: 0 auto;
            padding: 1.5rem 1rem 3rem;
            line-height: 1.6;
        }

        a {
            color: var(--primary-dark);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        hr {
            border: 0;
            border-top: 1px solid var(--border-soft);
            margin: 1rem 0 1.5rem;
        }

        .nav {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            flex-wrap: wrap;
            background-color: var(--bg-surface);
            border: 1px solid var(--border-soft);
            border-radius: 14px;
            padding: 0.65rem 1rem;
            box-shadow: 0 2px 8px rgba(30, 58, 138, 0.04);
        }

        .nav a {
            padding: 0.45rem 0.85rem;
            border-radius: 9px;
            color: var(--text-main);
            font-weight: 500;
            transition: background-color 0.15s ease, color 0.15s ease;
        }

        .nav a:hover {
            background-color: var(--bg-soft-blue);
            color: var(--primary-dark);
            text-decoration: none;
        }

        .nav a.active {
            background-color: var(--bg-soft-blue-hover);
            color: var(--primary-dark);
            font-weight: 700;
        }

        .nav .right {
            margin-left: auto;
            display: flex;
            gap: 0.65rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .inline {
            display: inline;
        }

        .card {
            background-color: var(--bg-surface);
            border: 1px solid var(--border-soft);
            border-radius: 14px;
            padding: 1.25rem 1.35rem;
            box-shadow: 0 2px 10px rgba(30, 58, 138, 0.04);
        }

        .row {
            display: grid;
            gap: 1rem;
            grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
        }

        .muted {
            color: var(--text-muted);
            font-size: 0.92rem;
        }

        .flash {
            background-color: var(--success-bg);
            border: 1px solid var(--success-border);
            color: var(--success-text);
            padding: 0.7rem 1rem;
            border-radius: 10px;
            margin: 0.85rem 0 1rem;
            font-weight: 500;
        }

        .error {
            background-color: var(--error-bg);
            border: 1px solid var(--error-border);
            color: var(--error-text);
            padding: 0.75rem 1rem;
            border-radius: 10px;
            margin: 0.85rem 0 1rem;
        }

        .error ul {
            margin: 0.35rem 0 0;
            padding-left: 1.2rem;
        }

        form label {
            display: block;
            margin-top: 0.9rem;
            margin-bottom: 0.35rem;
            font-weight: 600;
            color: var(--text-main);
        }

        input[type=text],
        input[type=url],
        input[type=email],
        input[type=password],
        textarea {
            width: 100%;
            padding: 0.65rem 0.8rem;
            border: 1px solid var(--border-soft);
            border-radius: 10px;
            background-color: #fafdff;
            color: var(--text-main);
            font-family: inherit;
            font-size: 0.96rem;
        }

        input[type=text]:focus,
        input[type=url]:focus,
        input[type=email]:focus,
        input[type=password]:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary);
            background-color: var(--bg-surface);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.16);
        }

        button,
        .btn {
            display: inline-block;
            background-color: var(--primary);
            color: #ffffff;
            border: 1px solid var(--primary);
            border-radius: 9px;
            padding: 0.5rem 0.95rem;
            font-size: 0.92rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.15s ease;
        }

        button:hover,
        .btn:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            text-decoration: none;
        }

        .btn-soft {
            background-color: var(--bg-soft-blue);
            color: var(--primary-dark);
            border-color: var(--border-soft);
        }

        .btn-soft:hover {
            background-color: var(--bg-soft-blue-hover);
            color: var(--primary-dark);
        }

        .btn-danger {
            background-color: #fee2e2;
            color: #b91c1c;
            border-color: #fecaca;
        }

        .btn-danger:hover {
            background-color: #fecaca;
            color: #991b1b;
        }

        .form-actions {
            display: flex;
            gap: 0.65rem;
            align-items: center;
            margin-top: 1.25rem;
        }

        .article-list {
            list-style: none;
            padding: 0;
            margin: 1rem 0 0;
            display: grid;
            gap: 0.75rem;
        }

        .article-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
            padding: 0.85rem 1rem;
            border: 1px solid var(--border-soft);
            border-radius: 11px;
            background-color: #f9fcff;
        }

        .article-actions {
            display: flex;
            gap: 0.45rem;
            align-items: center;
        }

        .pagination {
            display: flex;
            gap: 0.35rem;
            list-style: none;
            padding: 0;
            margin-top: 1.25rem;
            flex-wrap: wrap;
        }

        .pagination li a,
        .pagination li span {
            display: inline-block;
            padding: 0.35rem 0.7rem;
            border-radius: 8px;
            border: 1px solid var(--border-soft);
            background-color: var(--bg-surface);
            color: var(--text-main);
            font-size: 0.9rem;
        }

        .pagination li.active span {
            background-color: var(--bg-soft-blue-hover);
            border-color: #93c5fd;
            color: var(--primary-dark);
            font-weight: 700;
        }

        @media (max-width: 640px) {
            .nav .right {
                margin-left: 0;
                width: 100%;
                justify-content: flex-start;
                padding-top: 0.35rem;
            }
        }
    </style>
</head>
<body>
    @include('partials.nav')
    <main>
        @yield('content')
    </main>
</body>
</html>