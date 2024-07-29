<!-- resources/views/pdf_form.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>PDF Form</title>
</head>
<body>
    <form action="/comision/generar-pdf" method="POST">
        @csrf
        <label for="texto">Ingrese el texto para el PDF:</label>
        <input type="text" id="texto" name="texto">
        <button type="submit">Generar PDF</button>
    </form>
</body>
</html>
