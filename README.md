## Ficha de Revisões e Preparação - UFCD 00607 - Desenvolver programas complexos em linguagem est.
---

### Objetivo
O seguinte trabalho prático consiste no desenvolvimento de uma aplicação WEB com implementação da Framework Laravel como base de desenvolvimento e arquitetura de software, aplicando todos os conhecimentos adquiridos. Este exercício foca-se num domínio de negócio diferente para testar a capacidade de abstração e modelação de bases de dados.

### Contexto e Desenvolvimento
Uma rede de Clínicas Médicas requisitou uma aplicação web para modernizar a gestão do seu atendimento diário. O sistema deverá ser capaz de gerir os **Pacientes**, o corpo clínico (**Médicos** e as suas **Especialidades**), as **Consultas** agendadas, e a prescrição de **Medicamentos** (produzidos por diferentes **Laboratórios**).

A aplicação deverá gerir 6 entidades principais (Tabelas na Base de Dados):
1. **specialties** (Especialidades Médicas)
2. **laboratories** (Laboratórios Farmacêuticos)
3. **doctors** (Médicos)
4. **patients** (Pacientes)
5. **medications** (Medicamentos)
6. **appointments** (Consultas)

#### O Sistema de Relações:
* **1 para Muitos (1:N):**
  * Uma **Especialidade** tem vários **Médicos** (Um Médico pertence a uma Especialidade).
  * Um **Laboratório** produz vários **Medicamentos**.
  * Um **Paciente** tem várias **Consultas**.
  * Um **Médico** realiza várias **Consultas**.
* **Muitos para Muitos (N:M):**
  * Numa **Consulta** podem ser prescritos vários **Medicamentos**.
  * Um **Medicamento** pode ser prescrito em várias **Consultas**.
  * *(Isto obriga à criação de uma tabela Pivot para registar a prescrição).*

---

### O Trabalho Prático deverá conter os seguintes pontos:

1. **Arquitetura Base:** Criação de uma aplicação Laravel com sistema de Autenticação (Auth) e integração de Bootstrap (ou Tailwind).
2. **Master Page:** Definição de um *Layout* principal (Master Page) que inclua um menu de navegação responsivo para gerir todas as áreas da clínica.
3. **Migrações e Modelos:** Criação de todas as *Migrations*, *Models* (no singular, ex: `Doctor`, `Appointment`) e respetivas relações no Eloquent para as 6 tabelas principais e para a tabela pivot.
4. **Seeders:** 
   * Uma *Seed* para a tabela **specialties**: *Cardiologia, Pediatria, Clínica Geral, Neurologia, Ortopedia*.
   * Uma *Seed* para a tabela **laboratories**: *Bayer, Pfizer, Novartis, Roche*.
5. **Factories:**
   * Gerar 20 **patients** e 10 **doctors**.
   * Gerar 50 **medications** (associados a um Laboratório).
   * Gerar 30 **appointments** (associadas a um Paciente e a um Médico).
   * *Desafio:* No Seeder principal, associar aleatoriamente 1 a 4 medicamentos a cada consulta gerada.
6. **Views (Listagem e Detalhes):**
   * Criar páginas de listagem para Médicos, Pacientes e Consultas usando tabelas HTML.
   * Na listagem de Consultas, deve haver um botão para ver o "Detalhe da Consulta". Na view de detalhes, além da data e notas, deve aparecer o Paciente, o Médico, e uma lista com os Medicamentos prescritos nessa sessão.
7. **CRUDs Completos:**
   * Desenvolva o CRUD (Create, Read, Update, Delete) completo para **Doctors**, **Patients** e **Appointments**.
   * Garanta que os formulários de criação usam *dropdowns* (`<select>`) para escolher as chaves estrangeiras (ex: escolher a Especialidade ao criar um Médico).
8. **Validações:**
   * **Paciente:** O número de utente (SNS) deve ter exatamente 9 dígitos e ser único. Email único e obrigatório.
   * **Médico:** O número de cédula profissional deve ser único e obrigatório.
   * **Consulta:** A data da consulta não pode estar vazia. Exibir as mensagens de erro nos formulários Blade.

---

### Requisitos Mínimos das Tabelas e Campos:
*(Nota: Os IDs e Timestamps devem ser criados com os métodos padrão de migração do Laravel: `id()` e `timestamps()`)*

**specialties** (Modelo: `Specialty`)
* id
* name
* description (Opcional/Nullable)
* timestamps

**laboratories** (Modelo: `Laboratory`)
* id
* name
* contact_email
* timestamps

**doctors** (Modelo: `Doctor`)
* id
* name
* license_number (String, Único - Cédula Profissional)
* specialty_id (FK ligada a specialties)
* timestamps

**patients** (Modelo: `Patient`)
* id
* name
* email (Único)
* sns_number (String, 9 dígitos, Único - Número de Utente)
* birth_date (Date)
* timestamps

**medications** (Modelo: `Medication`)
* id
* name
* active_ingredient (Princípio ativo)
* laboratory_id (FK ligada a laboratories)
* timestamps

**appointments** (Modelo: `Appointment`)
* id
* appointment_date (DateTime)
* clinical_notes (Text, Notas da consulta)
* doctor_id (FK ligada a doctors)
* patient_id (FK ligada a patients)
* timestamps

**Tabela Pivot** (Para a prescrição de medicamentos nas consultas)
* **appointment_medication**
  * appointment_id (FK)
  * medication_id (FK)

**Bom trabalho**
