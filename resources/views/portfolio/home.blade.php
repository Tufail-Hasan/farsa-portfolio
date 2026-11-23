@extends('portfolio.layouts.app')

@section('title', 'Md. Farsa Mia | Junior Laravel Developer')

@section('content')

<header class="navbar">
    <div class="container nav-content">

        <a href="#" class="logo">Farsa<span>.</span></a>

        <nav id="navMenu">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#skills">Skills</a>
            <a href="#projects">Projects</a>
            <a href="#education">Education</a>
            <a href="#contact">Contact</a>
        </nav>

        <a href="#contact" class="nav-btn">Let's Talk</a>

        <button class="menu-toggle" id="menuToggle" aria-label="Toggle navigation">
            ☰
        </button>

    </div>
</header>

<main>

    <section class="hero" id="home">
        <div class="container hero-content">

            <div class="hero-text">

                <span class="badge">WELCOME TO MY PORTFOLIO</span>

                <h1>
                    Hi, I'm <span>Md. Farsa Mia</span>
                </h1>

                <h2>Junior Laravel Developer</h2>

                <p>
                    I build modern, scalable and user-friendly web applications
                    using PHP, Laravel and MySQL. I enjoy solving problems
                    and creating meaningful digital experiences.
                </p>

                <div class="hero-buttons">
                    <a href="#projects" class="btn primary-btn">View My Projects</a>
                    <a href="#contact" class="btn secondary-btn">Contact Me</a>
                </div>

                <div class="social-links">
                    <a href="https://github.com/Tufail-Hasan" target="_blank" rel="noopener noreferrer">GitHub ↗</a>
                </div>

            </div>

            <div class="hero-image">

                <div class="image-circle">
                    <img
                        src="{{ asset('images/profile/farsa-profile.jpg') }}"
                        alt="Md. Farsa Mia - Junior Laravel Developer"
                        class="profile-photo">
                </div>

                <div class="floating-card">
                    <span>💻</span>
                    <div>
                        <strong>Laravel Developer</strong>
                        <small>Building Web Applications</small>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="about section" id="about">

    <div class="container about-container">

        <div class="about-image">
            <div class="about-image-box">
                <img
                    src="{{ asset('images/profile/farsa-profile.jpg') }}"
                    alt="Md. Farsa Mia - Junior Laravel Developer"
                    class="about-profile-photo"
                >
            </div>
        </div>

        <div class="about-content">

            <span class="section-tag">DISCOVER MY JOURNEY</span>

            <h2 class="section-title">
                About <span>Me</span>
            </h2>

            <h3>Junior Laravel Developer</h3>

            <p>
                Hello! I'm Md. Farsa Mia, an aspiring Laravel Developer
                from Bangladesh with a passion for backend development
                and modern web technologies.
            </p>

            <p>
                I work with PHP, Laravel, MySQL, HTML, CSS, Bootstrap
                and JavaScript to develop dynamic and user-friendly
                web applications.
            </p>

            <p>
                I have worked on projects including a Smart Multi-Vendor
                eCommerce Management System, Fashion eCommerce Website
                and Student Management System.
            </p>

            <div class="about-details">

                <div>
                    <strong>Name:</strong>
                    <span>Md. Farsa Mia</span>
                </div>

                <div>
                    <strong>Location:</strong>
                    <span>Bangladesh</span>
                </div>

                <div>
                    <strong>Specialization:</strong>
                    <span>Laravel Development</span>
                </div>

            </div>

            <a href="#contact" class="btn primary-btn">
                Let's Work Together
            </a>

        </div>

    </div>

</section>

    <!-- Technical Skills Section -->
    <section class="skills-section" id="skills">
        <div class="container">

            <div class="section-heading">
                <span class="section-subtitle">MY EXPERTISE</span>
                <h2>Technical <span>Skills</span></h2>
                <p>
                    Technologies and tools I use to build modern,
                    responsive and dynamic web applications.
                </p>
            </div>

            <div class="skills-grid">

                <!-- Backend -->
                <div class="skill-card">
                    <div class="skill-icon">⚙️</div>
                    <h3>Backend Development</h3>

                    <div class="skill-tags">
                        <span>PHP</span>
                        <span>Laravel</span>
                        <span>MVC Architecture</span>
                        <span>REST API</span>
                    </div>
                </div>

                <!-- Frontend -->
                <div class="skill-card">
                    <div class="skill-icon">🎨</div>
                    <h3>Frontend Development</h3>

                    <div class="skill-tags">
                        <span>HTML5</span>
                        <span>CSS3</span>
                        <span>Bootstrap</span>
                        <span>JavaScript</span>
                        <span>Responsive Design</span>
                    </div>
                </div>

                <!-- Database -->
                <div class="skill-card">
                    <div class="skill-icon">🗄️</div>
                    <h3>Database Management</h3>

                    <div class="skill-tags">
                        <span>MySQL</span>
                        <span>Database Design</span>
                        <span>Eloquent ORM</span>
                        <span>Migrations</span>
                    </div>
                </div>

                <!-- Tools -->
                <div class="skill-card">
                    <div class="skill-icon">🛠️</div>
                    <h3>Development Tools</h3>

                    <div class="skill-tags">
                        <span>Git</span>
                        <span>GitHub</span>
                        <span>Composer</span>
                        <span>VS Code</span>
                        <span>Postman</span>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="projects section" id="projects">

        <div class="container">

            <span class="section-tag">MY RECENT WORK</span>

            <h2 class="section-title">
                Featured <span>Projects</span>
            </h2>

            <div class="project-grid">

                @foreach($projects as $project)

                <div class="project-card">

                    <div class="project-image">

                        @if($project['image'])
                        <img
                            src="{{ asset($project['image']) }}"
                            alt="{{ $project['title'] }}">
                        @else
                        <div class="project-placeholder">
                            <span>💻</span>
                            <h3>{{ $project['title'] }}</h3>
                        </div>
                        @endif

                    </div>

                    <div class="project-content">

                        @if($project['featured'])
                        <span class="featured-badge">
                            ⭐ Featured Project
                        </span>
                        @endif

                        <span class="project-category">
                            {{ $project['category'] }}
                        </span>

                        <h3>{{ $project['title'] }}</h3>

                        <p>{{ $project['description'] }}</p>

                        <div class="technology-list">

                            @foreach($project['technologies'] as $technology)

                            <span>{{ $technology }}</span>

                            @endforeach

                        </div>

                        <a
                            href="{{ $project['github'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="project-link">
                            GitHub Repository ↗
                        </a>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

    </section>

    <!-- Education Section -->
    <section class="education-section" id="education">
        <div class="container">

            <div class="section-heading">
                <span class="section-subtitle">MY BACKGROUND</span>
                <h2>My <span>Education</span></h2>
                <p>
                    My academic journey and educational background.
                </p>
            </div>

            <div class="education-wrapper">

                <div class="education-card">

                    <div class="education-icon">🎓</div>

                    <div class="education-content">

                        <span class="education-status">
                            FINAL SEMESTER COMPLETED
                        </span>

                        <h3>
                            Bachelor of Science (BSc)
                        </h3>

                        <h4>
                            Computer Science & Engineering (CSE)
                        </h4>

                        <p class="education-institution">
                            Vitish Bangla Institute of Management
                            & Technology
                        </p>

                        <p class="education-university">
                            National University, Bangladesh
                        </p>

                        <div class="education-details">
                            <span>📅 Start Year: 2021</span>
                            <span>📍 Mymensingh, Bangladesh</span>
                        </div>

                        <div class="education-note">
                            <strong>Current Status:</strong>
                            8th Semester Examination Completed.
                            Lab Examination & Viva Remaining.
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section" id="contact">
        <div class="container">

            <div class="section-heading">
                <span class="section-subtitle">GET IN TOUCH</span>
                <h2>Let's Work <span>Together</span></h2>
                <p>
                    Have a project or opportunity?
                    Feel free to contact me.
                </p>
            </div>

            <div class="contact-grid">

                <!-- Email -->
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=tufailhasanfarsa@gmail.com"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="contact-card">

                    <div class="contact-icon">✉️</div>

                    <h3>Email Me</h3>

                    <p>tufailhasanfarsa@gmail.com</p>

                    <span>Send an Email →</span>
                </a>

                <!-- GitHub -->
                <a href="https://github.com/Tufail-Hasan"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="contact-card">

                    <div class="contact-icon">💻</div>

                    <h3>GitHub</h3>

                    <p>Explore My Projects</p>

                    <span>Visit GitHub →</span>
                </a>

                <!-- LinkedIn -->
                <a href="https://www.linkedin.com/in/md-farsa-mia-0b7750450/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="contact-card">

                    <div class="contact-icon">🔗</div>

                    <h3>LinkedIn</h3>

                    <p>Connect With Me</p>

                    <span>Visit LinkedIn →</span>
                </a>

            </div>

        </div>
    </section>

</main>

<!-- Footer Section -->
<footer class="footer">
    <div class="footer-container">

        <div class="footer-logo">
            <a href="#home">Farsa<span>.</span></a>
            <p>Junior Laravel Developer</p>
        </div>

        <div class="footer-social">
            <a href="https://github.com/Tufail-Hasan"
                target="_blank"
                rel="noopener noreferrer">GitHub</a>

            <a href="https://www.linkedin.com/in/md-farsa-mia-0b7750450/"
                target="_blank"
                rel="noopener noreferrer">LinkedIn</a>

            <a href="mailto:tufailhasanfarsa@gmail.com">Email</a>
        </div>

    </div>

    <div class="footer-bottom">
        <p>
            &copy; {{ date('Y') }} Md. Farsa Mia.
            All Rights Reserved.
        </p>

        <a href="#home">Back to Top ↑</a>
    </div>
</footer>

@endsection
