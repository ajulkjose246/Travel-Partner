<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: /login');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Gallery - Travel Partner</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">

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

    <!-- Add this CSS in your head section or style.css -->
    <style>
    [data-bs-theme=light] .navbar-light {
        background-color: #f8f9fa !important;
        border-color: #dee2e6 !important;
    }

    [data-bs-theme=dark] .navbar-light {
        background-color: #212529 !important;
        border-color: #373b3e !important;
    }

    main {
        background-color: var(--bs-body-bg);
    }
    </style>
</head>

<body>

    <!-- Header START -->
    <header class="navbar-light bg-light border-bottom py-3">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="/">
                    <img class="light-mode-item navbar-brand-item d-inline h-70px h-md-90px" src="assets/images/logo.png" alt="logo">
                    <img class="dark-mode-item navbar-brand-item d-inline h-70px h-md-90px" src="assets/images/logo.png" alt="logo">
                </a>
                
                <!-- Navigation Items -->
                <div class="navbar-nav ms-auto">
                    <!-- Dark mode switch -->
                    <div class="nav-item me-3">
                        <button class="btn btn-link text-warning p-0" id="bd-theme" type="button"
                            aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-circle-half theme-icon-active" viewBox="0 0 16 16">
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
                    
                    <!-- Logout button -->
                    <div class="nav-item">
                        <form action="logout.php" method="POST" class="d-inline">
                            <button type="submit" class="btn btn-sm btn-dark">
                                <i class="bi bi-power me-2"></i>Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header END -->

    <!-- **************** MAIN CONTENT START **************** -->
    <main>
        <section class="pt-5">
            <div class="container">
                <?php
                if (isset($_SESSION['status']) && isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['status'] === 'success' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                        <?php 
                        echo htmlspecialchars($_SESSION['message']);
                        // Clear the session variables
                        unset($_SESSION['status']);
                        unset($_SESSION['message']);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Title -->
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h1 class="fs-2 mb-0">Manage Gallery</h1>
                    </div>
                </div>

                <!-- Upload Form -->
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8">
                        <div class="card border">
                            <div class="card-header bg-light">
                                <h5 class="card-title mb-0">Upload New Photo</h5>
                            </div>
                            <div class="card-body">
                                <form action="upload.php" method="POST" enctype="multipart/form-data" class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Select Images</label>
                                        <input type="file" class="form-control" name="images[]" accept="image/*" multiple required>
                                        <small class="text-muted">You can select multiple images at once</small>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Category</label>
                                        <select class="form-select" name="category" required>
                                            <option value="">Choose category...</option>
                                            <option value="cab">Cab Service</option>
                                            <option value="trips">Package Trips</option>
                                            <option value="safari">Jeep Safari</option>
                                            <option value="houseboat">House Boat</option>
                                            <option value="rooms">Room Booking</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-upload me-2"></i>Upload Photos
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Existing Photos -->
                <div class="row g-4">
                    <!-- Title and Filter -->
                    <div class="col-12 d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Existing Photos</h4>
                        <select class="form-select w-auto" id="categoryFilter">
                            <option value="all">All Categories</option>
                            <option value="cab">Cab Service</option>
                            <option value="trips">Package Trips</option>
                            <option value="safari">Jeep Safari</option>
                            <option value="houseboat">House Boat</option>
                            <option value="rooms">Room Booking</option>
                        </select>
                    </div>

                    <!-- Photo Grid -->
                    <?php
                    require_once 'includes/db_connect.php';

                    // Fetch photos from database
                    try {
                        $stmt = $pdo->query("SELECT * FROM gallery_photos ORDER BY id DESC");
                        $photos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                        $photos = [];
                    }

                    if (!empty($photos)): ?>
                        <?php foreach ($photos as $photo): ?>
                            <div class="col-md-6 col-lg-4 gallery-item" data-category="<?php echo htmlspecialchars($photo['category']); ?>">
                                <div class="card">
                                    <img src="assets/images/gallery/<?php echo htmlspecialchars($photo['filename']); ?>" 
                                         class="card-img-top" 
                                         alt="<?php echo htmlspecialchars($photo['category']); ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo ucfirst(htmlspecialchars($photo['category'])); ?></h5>
                                        <form action="delete-photo.php" method="POST" class="d-inline">
                                            <input type="hidden" name="photo_id" value="<?php echo $photo['id']; ?>">
                                            <button type="submit" class="btn btn-danger" 
                                                    onclick="return confirm('Are you sure you want to delete this photo?')">
                                                <i class="fas fa-trash-alt me-2"></i>Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert alert-info">No photos found in the gallery.</div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Add this before the closing </body> tag -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryFilter = document.getElementById('categoryFilter');
        const galleryItems = document.querySelectorAll('.gallery-item');

        categoryFilter.addEventListener('change', function() {
            const selectedCategory = this.value;
            
            galleryItems.forEach(item => {
                if (selectedCategory === 'all' || item.dataset.category === selectedCategory) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
    </script>
</body>

</html> 