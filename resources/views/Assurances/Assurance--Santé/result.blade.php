<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Assurance Artiste</title>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #6366f1;
            --primary-dark: #4338ca;
            --success: #059669;
            --error: #dc2626;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-700: #374151;
            --gray-800: #1f2937;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--gray-50) 0%, #e0f2fe 100%);
            min-height: 100vh;
            color: var(--gray-800);
            line-height: 1.6;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem;
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
            padding: 2rem 0;
        }

        .logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            border-radius: 20px;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            box-shadow: 0 10px 20px rgba(79, 70, 229, 0.2);
        }

        .header h1 {
            font-size: 2.5rem;
            color: var(--gray-800);
            margin-bottom: 1rem;
        }

        .header p {
            color: var(--gray-700);
            font-size: 1.1rem;
        }

        .card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--gray-700);
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1.25rem;
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background: var(--gray-50);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.875rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            color: white;
            box-shadow: 0 10px 20px rgba(79, 70, 229, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 25px rgba(79, 70, 229, 0.3);
        }

        .btn-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-link:hover {
            background: var(--gray-100);
        }

        .file-preview {
            width: 100%;
            height: 300px;
            border-radius: 12px;
            border: none;
            margin-bottom: 1.5rem;
            background: var(--gray-100);
        }

        .file-upload {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .file-upload input[type="file"] {
            width: 100%;
            padding: 0.875rem 1.25rem;
            border: 2px dashed var(--primary-light);
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background: var(--gray-50);
            cursor: pointer;
        }

        .file-upload input[type="file"]:hover {
            background: white;
            border-color: var(--primary);
        }

        .artist-info {
            background: var(--gray-50);
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
        }

        .artist-info h3 {
            color: var(--gray-800);
            margin-bottom: 0.5rem;
        }

        .artist-info p {
            color: var(--gray-700);
        }

        .message {
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            animation: slideIn 0.3s ease-out;
        }

        .message.success {
            background: #ecfdf5;
            color: var(--success);
            border: 1px solid #a7f3d0;
        }

        .message.error {
            background: #fef2f2;
            color: var(--error);
            border: 1px solid #fecaca;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .card {
                padding: 1.5rem;
            }

            .header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="logo">🎭</div>
            <h1>Gestion Assurance Artiste</h1>
            <p>Système de vérification et gestion des assurances pour artistes</p>
        </header>

        <div class="card">
            <div id="newArtistForm" >
                <h3 style="margin-bottom: 1.5rem; text-align: center;">Nouvel Artiste</h3>

                @if($artist)
                <h3 class="mb-3">Artiste : {{ $artist->name }}</h3>

                <p class="mb-4">Numéro : <strong>{{ $artist->insurance_number }}</strong></p>
                @if($artist->insurance_file)
                  <iframe src="{{ asset('storage/'.$artist->insurance_file) }}" width="100%" height="300" style="border-radius:0.5rem"></iframe>
                  <form action="{{ route('assurance.update', $artist->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    <div class="mb-3">
                      <input type="file" name="insurance_file" class="form-control" accept="application/pdf,image/*" required>
                    </div>
                    <button class="btn btn-info" style="width: 100%">Mettre à jour</button>
                  </form>
                @else
                  <form action="{{ route('assurance.update', $artist->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <input type="file" name="insurance_file" class="form-control" accept="application/pdf,image/*" required>
                    </div>
                    <button class="btn-gradient">Enregistrer</button>
                  </form>
                @endif
              @else
                <h3 class="mb-4 text-center">Aucun artiste trouvé pour « {{ $searched }} »</h3> <br>
                <form action="{{ route('assurance.create') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="artistName">Nom de l'artiste</label>
                    <input
                        type="text"
                        id="artistName"
                        name="name"
                        class="form-control"
                        required
                        placeholder="Nom de l'artiste"
                    >
                  </div>
                  <div class="form-group">
                    <label for="newInsuranceNumber">Numéro d'assurance</label>
                    <input
                        type="text"
                        id="newInsuranceNumber"
                        name="insurance_number"
                        class="form-control"
                        value="{{ $searched }}"
                        required
                    >
                  </div>
                  <div class="file-upload">
                    <input
                        type="file"
                        name="insurance_file"
                        accept="application/pdf,image/*"
                        required
                    >
                 </div>
                 <button type="submit" class="btn btn-primary" style="width: 100%">
                    Créer l'artiste
                 </button>
                </form>
              @endif

            </div>
        </div>
        <div style="text-align: center;">
            <a href="{{ route('assurance.index') }}" class="btn btn-link">
                Retour Accueil
            </a>
        </div>
    </div>

    <script>
        // Simulated database
        let artists = [
            { id: 1, name: "Jean Dubois", insurance_number: "12345", insurance_file: null },
            { id: 2, name: "Marie Martin", insurance_number: "67890", insurance_file: "https://example.com/sample.pdf" }
        ];

        function handleSearch(e) {
            e.preventDefault();
            const searchNumber = document.getElementById('searchNumber').value;
            const artist = artists.find(a => a.insurance_number === searchNumber);

            if (artist) {
                showArtistForm(artist);
            } else {
                showNewArtistForm(searchNumber);
            }
        }

        function showArtistForm(artist) {
            document.getElementById('searchForm').style.display = 'none';
            document.getElementById('artistForm').style.display = 'block';
            document.getElementById('newArtistForm').style.display = 'none';

            document.getElementById('artistName').textContent = artist.name;
            document.getElementById('artistNumber').textContent = `Numéro d'assurance: ${artist.insurance_number}`;

            const filePreview = document.getElementById('filePreview');
            if (artist.insurance_file) {
                filePreview.innerHTML = `<iframe src="${artist.insurance_file}" class="file-preview"></iframe>`;
                document.getElementById('submitButton').textContent = 'Mettre à jour';
            } else {
                filePreview.innerHTML = '';
                document.getElementById('submitButton').textContent = 'Enregistrer';
            }
        }

        function showNewArtistForm(searchNumber) {
            document.getElementById('searchForm').style.display = 'none';
            document.getElementById('artistForm').style.display = 'none';
            document.getElementById('newArtistForm').style.display = 'block';

            document.getElementById('newInsuranceNumber').value = searchNumber;
        }

        function handleFileUpload(e) {
            e.preventDefault();
            showMessage("Fichier d'assurance mis à jour avec succès", "success");
            setTimeout(resetForm, 2000);
        }

        function handleNewArtist(e) {
            e.preventDefault();
            showMessage("Nouvel artiste créé avec succès", "success");
            setTimeout(resetForm, 2000);
        }

        function showMessage(text, type) {
            const div = document.createElement('div');
            div.className = `message ${type}`;
            div.textContent = text;

            const form = document.querySelector('form');
            form.parentNode.insertBefore(div, form);
        }

        function resetForm() {
            document.getElementById('searchForm').style.display = 'block';
            document.getElementById('artistForm').style.display = 'none';
            document.getElementById('newArtistForm').style.display = 'none';

            document.getElementById('searchNumber').value = '';
            const messages = document.querySelectorAll('.message');
            messages.forEach(msg => msg.remove());
        }
    </script>
</body>
</html>




