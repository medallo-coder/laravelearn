<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro Persona Desaparecida</title>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f8;
    padding: 40px;
}

h1 {
    text-align: center;
    color: #333;
}

.form-container {
    background: #fff;
    max-width: 600px;
    margin: auto;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.step-indicator {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.step {
    flex: 1;
    text-align: center;
    padding: 10px;
    border-bottom: 4px solid #ccc;
    font-weight: bold;
}

.step.active {
    border-color: #e19d09ff;
    color: #e19d09ff;
}

.step-content {
    display: none;
}

.step-content.active {
    display: block;
}

label {
    font-weight: bold;
    margin-top: 10px;
    display: block;
}

input, textarea, select {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

textarea {
    resize: vertical;
}

.buttons {
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
}

button {
    background-color: #e19d09ff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #af621eff;
}

button.secondary {
    background-color: #999;
}
</style>
</head>
<body>

<h1>Registrar Persona Desaparecida</h1>

<div class="form-container">

    <!-- Indicador -->
    <div class="step-indicator">
        <div class="step active" id="step-1">Fase 1<br>Persona</div>
        <div class="step" id="step-2">Fase 2<br>Características</div>
        <div class="step" id="step-3">Fase 3<br>Prendas</div>
    </div>

    <!-- FASE 1 -->
    <div class="step-content active">
        <label>Nombres</label>
        <input type="text">

        <label>Apellidos</label>
        <input type="text">

        <label>Edad (desaparición)</label>
        <input type="number">

        <label>Descripción</label>
        <textarea></textarea>

        <label>Lugar de desaparición</label>
        <input type="text">

        <label>Fecha y hora</label>
        <input type="datetime-local">
    </div>

    <!-- FASE 2 -->
    <div class="step-content">
        <label>Sexo</label>
        <select>
            <option value="">Seleccione</option>
            <option>Hombre</option>
            <option>Mujer</option>
        </select>

        <label>Estatura</label>
        <input type="text">

        <label>Complexión</label>
        <input type="text">

        <label>Color de piel</label>
        <input type="text">

        <label>Color de ojos</label>
        <input type="text">

        <label>Color de cabello</label>
        <input type="text">

        <label>Tipo de cabello</label>
        <input type="text">

        <label>Señas particulares</label>
        <textarea></textarea>

        <label>Implantes</label>
        <input type="text">

        <label>Prótesis</label>
        <input type="text">
    </div>

    <!-- FASE 3 -->
    <div class="step-content">
        <label>Parte superior</label>
        <input type="text">

        <label>Color parte superior</label>
        <input type="text">

        <label>Parte inferior</label>
        <input type="text">

        <label>Color parte inferior</label>
        <input type="text">

        <label>Calzado</label>
        <input type="text">

        <label>Color calzado</label>
        <input type="text">

        <label>Accesorios</label>
        <input type="text">
    </div>

    <!-- BOTONES -->
    <div class="buttons">
        <button class="secondary" onclick="prevStep()">Atrás</button>
        <button onclick="nextStep()">Siguiente</button>
    </div>

</div>

<script>
let currentStep = 0;
const steps = document.querySelectorAll('.step-content');
const indicators = document.querySelectorAll('.step');

function updateSteps() {
    steps.forEach((step, index) => {
        step.classList.toggle('active', index === currentStep);
        indicators[index].classList.toggle('active', index === currentStep);
    });
}

function nextStep() {
    if (currentStep < steps.length - 1) {
        currentStep++;
        updateSteps();
    } else {
        alert('Formulario completado (simulado)');
    }
}

function prevStep() {
    if (currentStep > 0) {
        currentStep--;
        updateSteps();
    }
}
</script>

</body>
</html>
