<?php
require __DIR__ . '/config.php';

function e($value) {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

function asset($path) {
    $path = trim((string) ($path ?? ''));
    if ($path === '') {
        return '';
    }
    $path = ltrim(str_replace('\\', '/', $path), '/');
    $base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
    $segments = array_map('rawurlencode', explode('/', $path));
    $encoded = implode('/', $segments);
    if ($base === '' || $base === '.') {
        return '/' . $encoded;
    }
    return $base . '/' . $encoded;
}

$profile = null;
$about = null;
$skills = [];
$experiences = [];
$certificates = [];

if ($conn instanceof mysqli) {
    $profile = $conn->query("SELECT * FROM profile LIMIT 1");
    $profile = $profile ? $profile->fetch_assoc() : null;

    $about = $conn->query("SELECT * FROM about LIMIT 1");
    $about = $about ? $about->fetch_assoc() : null;

    $skillsResult = $conn->query("SELECT * FROM skills ORDER BY sort_order, id");
    if ($skillsResult) {
        while ($row = $skillsResult->fetch_assoc()) {
            $skills[] = $row;
        }
    }

    $expResult = $conn->query("SELECT * FROM experiences ORDER BY sort_order, id");
    if ($expResult) {
        while ($row = $expResult->fetch_assoc()) {
            $experiences[] = $row;
        }
    }

    $certResult = $conn->query("SELECT * FROM certificates ORDER BY sort_order, id");
    if ($certResult) {
        while ($row = $certResult->fetch_assoc()) {
            $certificates[] = $row;
        }
    }
}

$name = $profile['name'] ?? 'Nama Anda';
$greeting = $profile['greeting'] ?? "Assalamu'alaikum, saya";
$tagline = $profile['tagline'] ?? 'Mahasiswa Sistem Informasi';
$ctaText = $profile['cta_text'] ?? 'Tentang Saya';
$profileImage = $profile['profile_image'] ?? 'Foto Ilyasa.png';

$aboutHeading = $about['heading'] ?? 'Tentang Saya';
$aboutTitle = $about['profile_title'] ?? 'Profil';
$aboutText = $about['profile_text'] ?? '';

$footerName = $profile['footer_name'] ?? $name;
$footerYear = $profile['footer_year'] ?? date('Y');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio - <?php echo e($name); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Portofolio - <?php echo e($name); ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About Me</a></li>
                    <li class="nav-item"><a class="nav-link" href="#certificates">Certificates</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="home" class="py-5 section-divider">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h4><?php echo e($greeting); ?></h4>
                    <h1><?php echo e($name); ?></h1>
                    <p><?php echo e($tagline); ?></p>
                    <a href="#about" class="btn btn-primary"><?php echo e($ctaText); ?></a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="<?php echo e(asset($profileImage)); ?>" alt="Foto Profil" class="img-fluid rounded-circle" style="max-width: 300px;">
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-5 bg-light section-divider">
        <div class="container">
            <h2 class="text-center mb-4"><?php echo e($aboutHeading); ?></h2>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($aboutTitle); ?></h5>
                            <p class="card-text"><?php echo e($aboutText); ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Skills</h5>
                            <?php if (count($skills) > 0) : ?>
                                <?php foreach ($skills as $skill) : ?>
                                    <div class="mb-2">
                                        <div class="d-flex justify-content-between">
                                            <span><?php echo e($skill['name'] ?? ''); ?></span>
                                            <span><?php echo e($skill['level'] ?? '0'); ?>%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php echo e($skill['level'] ?? '0'); ?>%"></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p class="card-text">Belum ada data skill.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pengalaman</h5>
                            <?php if (count($experiences) > 0) : ?>
                                <ul>
                                    <?php foreach ($experiences as $exp) : ?>
                                        <li><?php echo e($exp['description'] ?? ''); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else : ?>
                                <p class="card-text">Belum ada data pengalaman.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="certificates" class="py-5 section-divider">
        <div class="container">
            <h2 class="text-center mb-4">Sertifikat</h2>
            <div class="row justify-content-center">
                <?php if (count($certificates) > 0) : ?>
                    <?php foreach ($certificates as $cert) : ?>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <img src="<?php echo e(asset($cert['image'] ?? '')); ?>" class="card-img-top" alt="Sertifikat">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-center"><?php echo e($cert['title'] ?? ''); ?></h5>
                                    <p class="card-text text-center"><?php echo e($cert['description'] ?? ''); ?></p>
                                    <p class="text-muted text-center"><?php echo e($cert['year'] ?? ''); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-center">Belum ada data sertifikat.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; <?php echo e($footerYear); ?> <?php echo e($footerName); ?></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
