## 1. ✏️ Introdução:

Uma solução WEB para tutores de pets, focada em agilizar o acesso a serviços de clínicas veterinárias de sua preferência remotamente, evitando filas, congestionamento, e qualquer outro tipo de "obstáculo" que dificulta a chegada até o destino, a consulta.  

---

## 2. 💻 Tecnologias Utilizadas:

!['CSS3'](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
!['HTML5'](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
!['Javascript'](https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E)
!['PHP'](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
!['vscode'](https://img.shields.io/badge/VSCode-0078D4?style=for-the-badge&logo=visual%20studio%20code&logoColor=white)
!['replit'](https://img.shields.io/badge/replit-667881?style=for-the-badge&logo=replit&logoColor=white)
!['xampp'](https://img.shields.io/badge/Xampp-F37623?style=for-the-badge&logo=xampp&logoColor=white)
![figma](https://img.shields.io/badge/Figma-F24E1E?style=for-the-badge&logo=figma&logoColor=white)
![mysql](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

--- 

## 3. 🐶 Arquitetura do Projeto (Vida4Pets)
O projeto foi desenvolvido utilizando uma arquitetura baseada no modelo cliente-servidor, focando em uma estrutura modular para facilitar a manutenção e a integração de testes.

### **3.1** 💻 Stack Tecnológica
Backend: PHP para o processamento de regras de negócio e comunicação com o servidor.

Frontend: JavaScript (Vanilla) para manipulação dinâmica do DOM e validações assíncronas.

Persistência de Dados: SQL (MySQL) para armazenamento estruturado das informações de pets e usuários.

### **3.2** 📝 Padrão de Projeto (MVC Adaptado)
O sistema segue uma organização lógica inspirada no padrão MVC (Model-View-Controller):

Model: Scripts PHP responsáveis pelas queries SQL e manipulação dos dados.

View: Interfaces em HTML/CSS que interagem com o usuário.

Controller: A lógica em PHP que recebe as requisições das telas, processa as informações e define qual resposta enviar.

### **3.3** 🖥 Fluxo de Requisições e Banco de Dados
A comunicação entre o frontend e o backend foi estruturada para garantir a integridade dos dados:

O JavaScript realiza o tratamento prévio dos dados no cliente (frontend).

As informações são enviadas via protocolos HTTP para o servidor PHP.

O banco de dados SQL foi modelado de forma relacional, garantindo que registros de pets estejam estritamente vinculados aos seus respectivos donos através de chaves estrangeiras (Foreign Keys).

---

## 4. 🔎 Pré-requisitos:

!['PHP'](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white) **PHP 8.0 ou superior;**

!['xampp'](https://img.shields.io/badge/Xampp-F37623?style=for-the-badge&logo=xampp&logoColor=white) **Acesso ao Apache pelo Xampp;**

![mysql](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white) **MySQL Workbench 9.0 ou superior;**

![Chrome](https://img.shields.io/badge/Google%20Chrome-4285F4?style=for-the-badge&logo=GoogleChrome&logoColor=white) **Recomendado o uso do Navegador Google Chrome para testes** 
