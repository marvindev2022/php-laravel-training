# Desafio Full Stack

Abaixo você encontrará todos as informações necessárias para iniciar o seu teste.

## Avisos antes de começar

- Crie um repositório no seu GitHub ou Gitlab (preferencialmente Gitlab).
- Faça seus commits no *seu repositório*.


## Objetivo: Fórum de Discussão

Você deverá desenvolver uma funcionalidade de "fórum de discussão" para a plataforma de LMS SaaS. O fórum de discussão permitirá que os usuários da plataforma interajam, compartilhem conhecimentos, tirem dúvidas e discutam sobre os cursos e conteúdos disponíveis.

**Requisitos Técnicos:**

1. Crie uma API RESTful utilizando Laravel e PHP para gerenciar as operações do fórum, como criar tópicos, postar mensagens, buscar tópicos por categoria, etc.

2. Utilize o banco de dados MySQL para armazenar as informações relacionadas aos tópicos, mensagens, usuários, etc.

3. Implemente a interface do usuário do fórum utilizando React e React Native, garantindo que seja responsiva e adequada para uso tanto em navegadores web quanto em dispositivos móveis.

4. Integre a interface do usuário com a API RESTful, permitindo que os usuários visualizem e interajam com os tópicos e mensagens do fórum.

5. Utilize o Git para controle de versão do código-fonte e faça commits periódicos para acompanhar o progresso do desenvolvimento.


**Diferencial (opcional):**

1. Docker: Crie um arquivo Dockerfile para cada componente da aplicação (backend e frontend) que especifique as dependências e comandos necessários para construir as imagens Docker.

2. Docker: Utilize o Docker Compose para orquestrar os contêineres e definir a configuração de rede necessária.

3. Docker: Garanta que a aplicação possa ser executada por meio de comandos Docker simples, como "docker-compose up" ou equivalentes.



**Entrega do Desafio:**

1. Crie um repositório no GitLab ou Github para o projeto e compartilhe o link com a equipe da G1learn.

2. Desenvolva a funcionalidade seguindo as melhores práticas de desenvolvimento, considerando a escalabilidade, segurança e eficiência.

3. Documente o processo de configuração e execução do projeto, incluindo instruções claras para a equipe da G1learn reproduzir e testar a funcionalidade desenvolvida.

4. Ao finalizar o desafio, envie um e-mail para a equipe da G1learn informando que o projeto está pronto para revisão.


# Avaliação

Apresente sua solução utilizando o framework que você desejar, justificando a escolha.
Atente-se a cumprir a maioria dos requisitos, pois você pode cumprir-los parcialmente e durante a avaliação vamos bater um papo a respeito do que faltou.

Teremos 2 partes da avaliação:

A correção objetiva será realizada através da utilização de um script de correção automatizada. Você **pode** rodar na sua máquina local ou usar outra ferramenta:
```
docker run -it --rm -v $(pwd):/project -w /project jakzal/phpqa phpmd app text cleancode,codesize,controversial,design,naming,unusedcode
```    

A correção qualitativa levará em conta os seguintes critérios:

## O que será avaliado de acordo com o nível da vaga
- Documentação com **desenho de arquitetura**
- Código limpo e organizado (nomenclatura, etc)
- Conhecimento de padrões (PSRs, design patterns, SOLID)
- Modelagem de Dados
- Manutenibilidade do Código
- Tratamento de erros
- Cuidado com itens de segurança
- Carinho em desacoplar componentes (outras camadas, service, repository)


## O que será um Diferencial
- Uso de Docker
- Frontend com react ou reac native
- Testes de [integração](https://www.atlassian.com/continuous-delivery/software-testing/types-of-software-testing)
- Testes [unitários](https://www.atlassian.com/continuous-delivery/software-testing/types-of-software-testing)
- Uso de Design Patterns
- Documentação
- Proposta de melhoria na arquitetura


## Materiais úteis
- https://hub.packtpub.com/why-we-need-design-patterns/
- https://refactoring.guru/
- http://br.phptherightway.com/
- https://www.php-fig.org/psr/psr-12/
- https://www.atlassian.com/continuous-delivery/software-testing/types-of-software-testing
- https://github.com/exakat/php-static-analysis-tools
- https://martinfowler.com/articles/microservices.htm
- https://docs.guzzlephp.org/en/stable/request-options.html
- https://www.devmedia.com.br/rest-tutorial/28912