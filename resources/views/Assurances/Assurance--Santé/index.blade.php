<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification Assurance Santé</title>
    <style>
        :root {
            --primary: #1a73e8;
            --primary-dark: #1557b0;
            --success: #0f9d58;
            --error: #dc3545;
            --gray-light: #f8f9fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body {
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
            min-height: 100vh;
            line-height: 1.6;
        }

        .header {
            background: white;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary);
            font-size: 1.5rem;
            font-weight: 600;
        }

        .lang-switch {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            border: none;
            background: var(--gray-light);
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .lang-switch:hover {
            background: #e9ecef;
        }

        .hero {
            background: var(--primary);
            color: white;
            padding: 4rem 1rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .verification-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 2rem;
            max-width: 500px;
            margin: -3rem auto 2rem;
            position: relative;
            transition: transform 0.3s;
        }

        .verification-card:hover {
            transform: translateY(-5px);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #444;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26,115,232,0.2);
        }

        .submit-btn {
            width: 100%;
            padding: 0.75rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .submit-btn:hover {
            background: var(--primary-dark);
        }

        .submit-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            padding: 4rem 1rem;
            background: white;
        }

        .feature-card {
            padding: 2rem;
            border: 1px solid #eee;
            border-radius: 8px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 1rem;
            padding: 0.75rem;
            background: #e8f0fe;
            border-radius: 50%;
            color: var(--primary);
        }

        .contact-banner {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
            padding: 3rem 1rem;
            margin-top: 2rem;
        }

        .contact-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .contact-phone {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: white;
            color: var(--primary);
            text-decoration: none;
            border-radius: 4px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .contact-phone:hover {
            background: #f8f9fa;
        }

        .footer {
            background: #2d3748;
            color: #cbd5e0;
            text-align: center;
            padding: 2rem;
            margin-top: 2rem;
        }

        .result-message {
            margin-top: 1rem;
            padding: 1rem;
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            animation: fadeIn 0.3s ease-out;
        }

        .result-message.success {
            background: #d4edda;
            color: var(--success);
        }

        .result-message.error {
            background: #f8d7da;
            color: var(--error);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(5px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .spinner {
            width: 20px;
            height: 20px;
            border: 2px solid #ffffff;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            margin-right: 0.5rem;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .contact-content {
                flex-direction: column;
                text-align: center;
            }

            .features {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <div class="logo">
                <span>❤️</span>
                <span>AssuraSanté</span>
            </div>
            <button class="lang-switch" onclick="toggleLanguage()">
                🌐 <span id="langText">EN</span>
            </button>
        </div>
    </header>

    <section class="hero">
        <h1 id="heroTitle">Vérification Assurance Santé</h1>
        <p id="heroSubtitle">Accédez rapidement à vos informations d'assurance</p>
    </section>

    <div class="container">
        <div class="verification-card">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('assurance.search') }}" method="POST" class="row g-3">
                @method('post')
                @csrf
                <div class="form-group">
                    <label for="insurance_number" id="formLabel">Numéro d'assurance</label>
                    <input
                        type="text"
                        id="insurance_number"
                        name="insurance_number"
                        required
                        minlength="8"
                        maxlength="12"
                        placeholder="Entrez votre numéro à 12 chiffres"
                    >
                </div>
                <button type="submit" class="submit-btn" id="submitBtn">
                    🔍 <span id="searchText">Rechercher</span>
                </button>
            </form>
            <div id="result"></div>
        </div>
    </div>

    <section class="features">
        <div class="feature-card">
            <div class="feature-icon">🛡️</div>
            <h3 id="feature1Title">Couverture Complète</h3>
            <p id="feature1Desc">Protection pour tous vos besoins de santé</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">📞</div>
            <h3 id="feature2Title">Assistance 24/7</h3>
            <p id="feature2Desc">Notre équipe est disponible à tout moment</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">⚡</div>
            <h3 id="feature3Title">Traitement Rapide</h3>
            <p id="feature3Desc">Remboursements accélérés pour votre confort</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🌍</div>
            <h3 id="feature4Title">Couverture Mondiale</h3>
            <p id="feature4Desc">Protection où que vous soyez dans le monde</p>
        </div>
    </section>

    <section class="contact-banner">
        <div class="contact-content">
            <div>
                <h2 id="contactTitle">Contact d'urgence</h2>
                <p id="contactDesc">Pour toute assistance médicale urgente</p>
            </div>
            <a href="tel:+243857903512" class="contact-phone">
                📞 +243 85 79 03 512
            </a>
        </div>
    </section>

    <footer class="footer">
        <p id="footerText">© 2025 AssuraSanté. Tous droits réservés.</p>
    </footer>

    <script>
        const translations = {
            fr: {
                heroTitle: 'Vérification Assurance Santé',
                heroSubtitle: 'Accédez rapidement à vos informations d\'assurance',
                formLabel: 'Numéro d\'assurance',
                searchText: 'Rechercher',
                feature1Title: 'Couverture Complète',
                feature1Desc: 'Protection pour tous vos besoins de santé',
                feature2Title: 'Assistance 24/7',
                feature2Desc: 'Notre équipe est disponible à tout moment',
                feature3Title: 'Traitement Rapide',
                feature3Desc: 'Remboursements accélérés pour votre confort',
                feature4Title: 'Couverture Mondiale',
                feature4Desc: 'Protection où que vous soyez dans le monde',
                contactTitle: 'Contact d\'urgence',
                contactDesc: 'Pour toute assistance médicale urgente',
                footerText: '© 2025 AssuraSanté. Tous droits réservés.',
                searching: 'Recherche en cours...',
                success: 'Assurance valide et active',
                error: 'Numéro d\'assurance introuvable',
                placeholder: 'Entrez votre numéro à 12 chiffres'
            },
            en: {
                heroTitle: 'Health Insurance Verification',
                heroSubtitle: 'Access your insurance information quickly',
                formLabel: 'Insurance Number',
                searchText: 'Search',
                feature1Title: 'Complete Coverage',
                feature1Desc: 'Protection for all your health needs',
                feature2Title: '24/7 Support',
                feature2Desc: 'Our team is available at any time',
                feature3Title: 'Fast Processing',
                feature3Desc: 'Accelerated reimbursements for your comfort',
                feature4Title: 'Worldwide Coverage',
                feature4Desc: 'Protection wherever you are in the world',
                contactTitle: 'Emergency Contact',
                contactDesc: 'For any urgent medical assistance',
                footerText: '© 2025 HealthAssure. All rights reserved.',
                searching: 'Searching...',
                success: 'Insurance valid and active',
                error: 'Insurance number not found',
                placeholder: 'Enter your 12-digit number'
            }
        };

        let currentLang = 'fr';

        function updateTexts() {
            const texts = translations[currentLang];
            Object.keys(texts).forEach(key => {
                const element = document.getElementById(key);
                if (element) {
                    element.textContent = texts[key];
                }
            });
            document.getElementById('insurance_number').placeholder = texts.placeholder;
        }

        function toggleLanguage() {
            currentLang = currentLang === 'fr' ? 'en' : 'fr';
            document.getElementById('langText').textContent = currentLang === 'fr' ? 'EN' : 'FR';
            updateTexts();
        }

        function handleSubmit(event) {
            event.preventDefault();
            const insuranceNumber = document.getElementById('insurance_number').value;
            const submitBtn = document.getElementById('submitBtn');
            const result = document.getElementById('result');

            if (insuranceNumber.length < 8) return;

            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = `<div class="spinner"></div><span>${translations[currentLang].searching}</span>`;
            result.innerHTML = '';

            // Simulate API verification
            setTimeout(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = `🔍 ${translations[currentLang].searchText}`;

                const isValid = parseInt(insuranceNumber.slice(-1)) % 2 === 0;
                const message = translations[currentLang][isValid ? 'success' : 'error'];
                const icon = isValid ? '✅' : '❌';

                result.innerHTML = `
                    <div class="result-message ${isValid ? 'success' : 'error'}">
                        ${icon} ${message}
                    </div>
                `;
            }, 1500);
        }

        // Initialize texts
        updateTexts();
    </script>
</body>
</html>
