<?php
session_start();

// If already logged in, redirect to /admin
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: /admin');
    exit();
}

// Check login credentials
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === 'travelpartner' && $password === 'travelpartnertky@kerala') {
        $_SESSION['logged_in'] = true;
        header('Location: /admin');
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - Travel Partner</title>
    
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if (el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })
            }
        })
    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo.png">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <!-- Add this updated preloader at the beginning of the body -->
    <div id="preloader">
        <div class="loader">
            <img src="assets/images/logo.png" alt="Loading...">
        </div>
    </div>

    <!-- Main Content START -->
    <main class="vh-100 d-flex flex-column">
        <!-- Header START -->
        <header class="navbar-light py-2">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <img class="light-mode-item navbar-brand-item d-inline h-50px h-md-60px" src="assets/images/logo.png" alt="logo">
                        <img class="dark-mode-item navbar-brand-item d-inline h-50px h-md-60px" src="assets/images/logo.png" alt="logo">
                    </a>

                    <!-- Dark mode switch -->
                    <div class="nav-item dropdown ms-2">
                        <button class="btn btn-link text-warning lh-3 p-0 mb-0" id="bd-theme" type="button"
                            aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-circle-half theme-icon-active fa-fw" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
                                <use href="#"></use>
                            </svg>
                        </button>

                        <ul class="dropdown-menu min-w-auto dropdown-menu-end" aria-labelledby="bd-theme">
                            <li class="mb-1">
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="light">
                                    <svg width="16" height="16" fill="currentColor"
                                        class="bi bi-brightness-high-fill fa-fw mode-switch me-1"
                                        viewBox="0 0 16 16">
                                        <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                                        <use href="#"></use>
                                    </svg>Light
                                </button>
                            </li>
                            <li class="mb-1">
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-moon-stars-fill fa-fw mode-switch me-1"
                                        viewBox="0 0 16 16">
                                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                                        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM3.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L3.863.1z" />
                                        <use href="#"></use>
                                    </svg>Dark
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center active"
                                    data-bs-theme-value="auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-circle-half fa-fw mode-switch me-1"
                                        viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
                                        <use href="#"></use>
                                    </svg>Auto
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Header END -->

        <!-- Login Section START -->
        <section class="flex-grow-1 d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow">
                            <div class="card-body p-3">
                                <div class="text-center mb-3">
                                    <h3 class="mb-0">Admin Login</h3>
                                    <p class="small text-secondary mt-1">Please enter your credentials</p>
                                </div>
                                
                                <?php if (isset($error)): ?>
                                    <div class="alert alert-danger py-2"><?php echo htmlspecialchars($error); ?></div>
                                <?php endif; ?>

                                <form method="POST" action="">
                                    <div class="mb-2">
                                        <label for="username" class="form-label"><i class="fas fa-user me-2"></i>Username</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label"><i class="fas fa-lock me-2"></i>Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-sign-in-alt me-2"></i>Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login Section END -->

        <!-- Footer START -->
        <footer class="bg-dark">
            <div class="container">
                <div class="row py-2">
                    <div class="col-12 text-center">
                        <p class="text-body-secondary mb-0">© 2024 Travel Partner. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer END -->
    </main>
    <!-- Main Content END -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ThemeFunctions -->
    <script src="assets/js/functions.js"></script>

    <!-- Add this script just before the closing body tag -->
    <script>
        // Function to check and apply the current theme to the preloader
        function applyThemeToPreloader() {
            const theme = document.documentElement.getAttribute('data-bs-theme');
            document.getElementById('preloader').setAttribute('data-bs-theme', theme);
        }

        // Apply theme immediately when the script runs
        applyThemeToPreloader();

        // Also apply theme when it changes
        const observer = new MutationObserver(applyThemeToPreloader);
        observer.observe(document.documentElement, { attributes: true, attributeFilter: ['data-bs-theme'] });

        const minDisplayTime = 2000; // 2 seconds
        const startTime = new Date().getTime();

        window.addEventListener('load', function () {
            const currentTime = new Date().getTime();
            const elapsedTime = currentTime - startTime;

            if (elapsedTime < minDisplayTime) {
                setTimeout(hidePreloader, minDisplayTime - elapsedTime);
            } else {
                hidePreloader();
            }
        });

        function hidePreloader() {
            var preloader = document.getElementById('preloader');
            preloader.style.display = 'none';
            // Disconnect the observer when the preloader is hidden
            observer.disconnect();
        }
    </script>
</body>
</html> 