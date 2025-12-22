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
.is-invalid {
    border: 1px solid #f5c2c7;
    background: #fff5f5;
}
.error-text {
    color: red;
    font-weight: bold;
    font-size: 0.9rem;
}

</style>
</head>
<body>

<h1>Registrar Persona Desaparecida</h1>

<div class="form-container">

<form method="POST" action="{{ route('desaparecidos.store') }}">
    @csrf

    <!-- Indicador -->
    <div class="step-indicator">
        <div class="step active">Fase 1<br>Persona</div>
        <div class="step">Fase 2<br>Características</div>
        <div class="step">Fase 3<br>Prendas</div>
    </div>

    <!-- FASE 1 -->
    <div class="step-content active">

    @if ($errors->any()) 
    @foreach ($errors->all() as $error) @endforeach
    <div class="error-text">{{ $error }}</div>
    @endif
 

        <label>Nombres</label>
        <input type="text" name="nombres">

        
        <label>Apellidos</label>
        <input type="text" name="apellidos">

        <label>Descripción</label>
        <textarea name="descripcion"></textarea>

        <label>Lugar de desaparición</label>
        <input type="text" name="lugar_desaparicion">

        <label>Fecha y hora</label>
        <input type="datetime-local" name="fecha_desaparicion">
    </div>

    <!-- FASE 2 -->
    <div class="step-content">
        <label>Sexo</label>
        <select name="sexo">
            <option value="">Seleccione</option>
            <option value="hombre">Hombre</option>
            <option value="mujer">Mujer</option>
        </select>

        <label>Estatura</label>
        <input type="text" name="estatura">

        <label>Edad desaparición</label>
        <input type="number" name="edad">

        <label>Complexión</label>
        <input type="text" name="complexion">

        <label>Color de piel</label>
        <input type="text" name="color_piel">

        <label>Color de ojos</label>
        <input type="text" name="color_ojos">

        <label>Color de cabello</label>
        <input type="text" name="color_cabello">

        <label>Tipo de cabello</label>
        <input type="text" name="tipo_cabello">

        <label>Señas particulares</label>
        <textarea name="senas_particulares"></textarea>

        <label>Implantes</label>
        <input type="text" name="implantes">

        <label>Prótesis</label>
        <input type="text" name="protesis">
    </div>

    <!-- FASE 3 -->
    <div class="step-content">
        <label>Parte superior</label>
        <input type="text" name="parte_superior">

        <label>Color parte superior</label>
        <input type="text" name="color_superior">

        <label>Parte inferior</label>
        <input type="text" name="parte_infeiror">

        <label>Color parte inferior</label>
        <input type="text" name="color_infeiror">

        <label>Calzado</label>
        <input type="text" name="calzado">

        <label>Color calzado</label>
        <input type="text" name="color_calzado">

        <label>Accesorios</label>
        <input type="text" name="accesorios">
    </div>

    <!-- BOTONES -->
    <div class="buttons">
        <button type="button" class="secondary" id="prevBtn" onclick="prevStep()">Atrás</button>
        <button type="button" id="nextBtn" onclick="nextStep()">Siguiente</button>
        <button type="submit" id="saveBtn" style="display:none;">Guardar</button>
    </div>

</form>
</div>

<script>

let currentStep = 0;
const steps = document.querySelectorAll('.step-content');
const indicators = document.querySelectorAll('.step');

const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const saveBtn = document.getElementById('saveBtn');

function updateSteps() {
    steps.forEach((step, index) => {
        step.classList.toggle('active', index === currentStep);
        indicators[index].classList.toggle('active', index === currentStep);
    });

    prevBtn.style.display = currentStep === 0 ? 'none' : 'inline-block';

    if (currentStep === steps.length - 1) {
        nextBtn.style.display = 'none';
        saveBtn.style.display = 'inline-block';
    } else {
        nextBtn.style.display = 'inline-block';
        saveBtn.style.display = 'none';
    }
}

function nextStep() {
    if (currentStep < steps.length - 1) {
        currentStep++;
        updateSteps();
    }
}

function prevStep() {
    if (currentStep > 0) {
        currentStep--;
        updateSteps();
    }
}

updateSteps();
</script>





</body>
</html>
