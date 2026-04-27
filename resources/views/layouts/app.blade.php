<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'ORCHARD PANEL')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        html, body {
            margin: 0;
            padding: 0;
        }

        body {
            background: #f4f6fb;
            color: #18233c;
        }

        .login-page {
            min-height: 100vh;
            background:
                linear-gradient(rgba(255,255,255,0.08), rgba(255,255,255,0.08)),
                url("{{ asset('images/bumi.jpg') }}") center/cover no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-box {
            width: 460px;
            background: white;
            padding: 34px 24px 26px;
            border-radius: 6px;
            box-shadow: 0 8px 28px rgba(0,0,0,0.35);
        }

        .login-title {
            text-align: center;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 28px;
            color: #111827;
        }

        .login-line {
            border: none;
            border-top: 1px solid #e5e7eb;
            margin-bottom: 18px;
        }

        .input-group {
            display: flex;
            margin-bottom: 16px;
        }

        .input-icon {
            width: 50px;
            background: #427df5;
            color: white;
            font-size: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .input-group input {
            width: 100%;
            border: 1px solid #d1d5db;
            border-left: none;
            padding: 13px 15px;
            font-size: 16px;
            outline: none;
        }

        .option-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 26px 0 30px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .forgot {
            color: #111827;
            font-weight: bold;
            text-decoration: none;
        }

        .btn-login {
            width: 100%;
            border: none;
            background: #427df5;
            color: white;
            padding: 15px;
            font-size: 17px;
            border-radius: 3px;
            cursor: pointer;
            margin-bottom: 28px;
        }

        .login-bottom {
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
            text-align: center;
        }

        .login-bottom a {
            color: #111827;
            text-decoration: none;
            font-weight: 800;
        }

        .dashboard-wrapper {
            display: flex;
            min-height: 100vh;
            background: #f4f6fb;
        }

        .sidebar {
            width: 300px;
            background: white;
            box-shadow: 3px 0 15px rgba(0,0,0,0.08);
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            overflow-y: auto;
        }

        .sidebar-header {
            height: 88px;
            background: #303548;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 26px;
        }

        .brand {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .menu-circle {
            width: 38px;
            height: 38px;
            border: 1px solid white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-box {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 35px 22px 25px;
        }

        .avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #5ed8e8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .user-name {
            font-weight: bold;
            font-size: 17px;
            color: #000;
        }

        .user-role {
            margin-top: 5px;
            font-size: 15px;
            color: #111827;
        }

        .nav-title {
            color: #999;
            font-size: 18px;
            padding: 15px 22px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 22px;
            color: #000;
            text-decoration: none;
            font-size: 16px;
        }

        .nav-link:hover {
            background: #f1f5f9;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .nav-icon {
            width: 36px;
            height: 36px;
            border-radius: 4px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .blue { background: #477df6; }
        .pink { background: #f7557a; }
        .green { background: #8bc34a; }
        .orange { background: #ffb13d; }
        .purple { background: #7c4dff; }

        .sub-menu {
            padding-left: 58px;
            margin-bottom: 10px;
        }

        .sub-menu a {
            display: block;
            color: #18233c;
            text-decoration: none;
            padding: 9px 0;
            font-size: 15px;
        }

        .main-content {
            margin-left: 300px;
            width: calc(100% - 300px);
        }

        .topbar {
            height: 88px;
            background: white;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 42px;
        }

        .top-user {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 18px;
        }

        .content-area {
            padding: 80px 42px 40px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 35px;
            margin-bottom: 36px;
        }

        .stat-card {
            background: white;
            min-height: 150px;
            border-radius: 5px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.12);
            padding: 22px 26px;
            position: relative;
        }

        .stat-icon {
            position: absolute;
            top: -18px;
            left: 26px;
            width: 75px;
            height: 75px;
            border-radius: 8px;
            color: white;
            font-size: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-title {
            text-align: right;
            font-size: 17px;
            font-weight: bold;
        }

        .stat-value {
            text-align: right;
            font-size: 28px;
            margin: 15px 0 25px;
        }

        .stat-info {
            color: #8c95a3;
            font-size: 16px;
        }

        .running-box {
            border: 1px solid #58c7ff;
            background: white;
            color: #5bc7ef;
            padding: 16px;
            border-radius: 4px;
            font-weight: bold;
            text-align: right;
            font-size: 17px;
            margin-bottom: 35px;
        }

        .welcome-card,
        .notice-box,
        .order-card,
        .history-card,
        .profile-card {
            background: white;
            border-radius: 5px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.12);
        }

        .welcome-card,
        .order-card,
        .history-card,
        .profile-card {
            padding: 28px;
        }

        .notice-box {
            padding: 14px 18px;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .form-label {
            display: block;
            margin: 18px 0 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            font-size: 15px;
            outline: none;
        }

        .form-control:disabled {
            background: #e5e7eb;
        }

        .form-warning {
            color: #ff5c7a;
            font-size: 13px;
            margin-top: 6px;
        }

        .btn-row {
            margin-top: 20px;
        }

        .btn-reset {
            background: #f7557a;
            color: white;
            border: none;
            padding: 13px 26px;
            font-size: 15px;
            cursor: pointer;
        }

        .btn-order {
            background: #427df5;
            color: white;
            border: none;
            padding: 13px 26px;
            font-size: 15px;
            cursor: pointer;
        }

        .status-tabs {
            background: #109c9c;
            color: white;
            display: flex;
            gap: 35px;
            padding: 16px 20px;
            margin-bottom: 25px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        .history-table th,
        .history-table td {
            border: 1px solid #e5e7eb;
            padding: 14px;
            text-align: left;
        }

        .history-table tr:nth-child(even) {
            background: #f0f0f0;
        }

        .badge-success {
            background: #427df5;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 12px;
        }

        .badge-error {
            background: #f7557a;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 12px;
        }

        .table-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 18px;
        }

        .pagination button {
            border: 1px solid #d1d5db;
            background: white;
            padding: 10px 14px;
        }

        .pagination .active {
            background: #427df5;
            color: white;
        }

        .footer {
            display: none;
        }
    </style>
</head>
<body>

@yield('content')

<x-footer></x-footer>

</body>
</html>