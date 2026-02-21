🌍 Read this project in: [Español](https://github.com/gczabalegui/Flowa-UNS)

# Flowa-UNS

Final university project developed for the Information Systems Engineering degree.

## Overview
Flowa-UNS is a web-based system designed to manage the creation, review, and approval workflow of academic course syllabi. The application supports multiple user roles and enforces a structured validation process from draft creation to final approval.

## User Roles & Workflow

### Administration
- Creates and manages user roles involved in the workflow
- Manages core entities such as degrees, courses, and syllabi
- Completes administrative data including course workload, credits, and prerequisites
- Creates, edits, and submits syllabus drafts to the responsible professor
- Handles corrections when a syllabus is rejected and resubmits it into the workflow

### Responsible Professor
- Completes academic content such as objectives, syllabus structure, learning outcomes, activities, and bibliography
- Reviews and edits syllabi received from administration
- Saves syllabi as drafts or submits them for academic approval
- Can reuse approved syllabi for future academic years

### Academic Office
- Reviews completed syllabi and decides whether to approve or reject them
- Returns rejected syllabi for correction and resubmission
- Final approval completes the workflow

### Curriculum Committee
- Accesses approved syllabi
- Generates official PDF documents following institutional formatting standards
- Downloads, prints, or shares generated documents

## Main Features
- Role-based access control
- Multi-step approval workflow
- Draft and revision management
- PDF generation for approved syllabi
- Structured academic and administrative data handling

## Technologies Used
- PHP
- Laravel Blade Templates
- JavaScript
- HTML & CSS
- SQL
- Git

## Purpose
This project was developed to simulate a real-world academic management system, applying software engineering principles such as role separation, workflow validation, and maintainable system design.

## Contributors
- Guadalupe Carreño Zabalegui
- Florencia Loustaunau
