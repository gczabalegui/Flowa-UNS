<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; }
        .header, .footer { text-align: center; }
        .content { margin: 20px; }
        .title { font-weight: bold; font-size: 20px; text-align: center; margin-bottom: 20px; }
        .section { margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <p>UNIVERSIDAD NACIONAL DEL SUR</p>
        <p>BAHIA BLANCA - ARGENTINA</p>
        <p>DEPARTAMENTO DE: QUIMICA</p>
        <p>PROGRAMA DE: CONCEPTOS BASICOS DE QUIMICA</p>
    </div>
    <div class="content">
        <div class="section"><strong>ESTADO:</strong> {{ $estado }}</div>
        <div class="section"><strong>AÑO:</strong> {{ $anio }}</div>
        <div class="section"><strong>HORAS TOTALES:</strong> {{ $horas_totales }}</div>
        <div class="section"><strong>HORAS TEORICAS:</strong> {{ $horas_teoricas }}</div>
        <div class="section"><strong>HORAS PRACTICAS:</strong> {{ $horas_practicas }}</div>
        <div class="section"><strong>DTE:</strong> {{ $DTE }}</div>
        <div class="section"><strong>RTF:</strong> {{ $RTF }}</div>
        <div class="section"><strong>CRÉDITOS ACADÉMICOS:</strong> {{ $creditos_academicos }}</div>
        <div class="section"><strong>ÁREA TEMÁTICA:</strong> {{ $area_tematica }}</div>
        <div class="section"><strong>FUNDAMENTACIÓN:</strong> {{ $fundamentacion }}</div>
        <div class="section"><strong>CONTENIDOS MÍNIMOS:</strong> {{ $cont_minimos }}</div>
        <div class="section"><strong>PROGRAMA ANALÍTICO:</strong> {{ $programa_analitico }}</div>
        <div class="section"><strong>ACTIVIDADES PRÁCTICAS:</strong> {{ $act_practicas }}</div>
        <div class="section"><strong>MODALIDAD:</strong> {{ $modalidad }}</div>
        <div class="section"><strong>BIBLIOGRAFÍA:</strong> {{ $bibliografia }}</div>
    </div>
    <div class="footer">
        <p>Este es un pie de página</p>
    </div>
</body>
</html>
