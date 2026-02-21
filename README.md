🌍 Read this project in: [English](https://github.com/gczabalegui/Flowa-UNS/tree/readme-en)

# Flowa-UNS

Proyecto final desarrollado para la carrera de Ingeniería en Sistemas de Información.

## Descripción general
Flowa-UNS es un sistema web diseñado para gestionar el circuito de elaboración, revisión y aprobación de programas de materias. La aplicación soporta múltiples perfiles de usuario y establece un flujo de validación estructurado desde la creación del borrador hasta su aprobación final.

## Perfiles de usuario y flujo del sistema

### Administración
- Crea y gestiona los perfiles de usuario involucrados en el circuito (administración, secretaría académica, comisión curricular y profesor responsable)
- Administra las entidades necesarias para la creación de programas de materia, tales como carreras, materias y programas
- Completa datos administrativos del programa (año, cargas horarias, créditos académicos, correlativas y métricas institucionales)
- Crea, edita y envía programas al profesor responsable para su revisión
- Rectifica programas rechazados y los reenvía para continuar el circuito de aprobación

### Profesor responsable
- Completa los contenidos académicos del programa (área temática, fundamentación, objetivos, contenidos, actividades y bibliografía)
- Revisa, edita y guarda programas como borrador o de forma definitiva
- Envía los programas a secretaría académica para su evaluación
- Puede reutilizar programas aprobados para nuevos períodos académicos

### Secretaría académica
- Revisa los programas completos y decide su aprobación o desaprobación
- Devuelve programas rechazados a administración o al profesor responsable para su corrección
- La aprobación finaliza el circuito del programa de materia

### Comisión curricular
- Accede a los programas aprobados por secretaría académica
- Genera archivos PDF con el formato institucional definido
- Descarga, imprime o comparte los documentos generados

## Funcionalidades principales
- Control de acceso basado en roles
- Flujo de aprobación en múltiples etapas
- Gestión de borradores y revisiones
- Generación de documentos PDF
- Manejo estructurado de datos académicos y administrativos

## Tecnologías utilizadas
- PHP
- Laravel Blade
- JavaScript
- HTML y CSS
- SQL
- Git

## Objetivo del proyecto
Este proyecto fue desarrollado para simular un sistema académico real, aplicando principios de ingeniería de software como separación de responsabilidades, validación de flujos de trabajo y diseño mantenible.

## Autores
- Guadalupe Carreño Zabalegui
- Florencia Loustaunau
