Tutorial básico de git: https://www.notion.so/GIT-GITHUB-231254d9302e8044b3b1cca361ba0311?source=copy_link


### 1. **Configuração Inicial do Repositório (apenas uma vez)**
```bash
# Um membro cria o repositório no GitHub e adiciona os colaboradores:
# Settings -> Collaborators -> Add people

# Cada membro faz clone localmente:
git clone https://github.com/usuario/projeto-faculdade.git
cd jogoDaMemoria-progweb
```

### 2. **Estrutura de Branches Recomendada**
```
main          (versão estável)
develop       (integração de features)
feature/*     (novas funcionalidades)
hotfix/*      (correções urgentes)
```

---

### 1. **Antes de começar a codar:**
```bash
# Atualizar repositório local
git checkout main
git pull origin main (pra pegar a ultima versão do repositório)

# Criar nova branch para sua tarefa
git checkout -b feature/nome-da-sua-feature
```

### 2. **Durante o desenvolvimento:**
```bash
# Fazer commits frequentes e atômicos
git add .
git commit -m "feat: adiciona funcionalidade X"(comentar detalhadamente o que fez)

# Enviar branch para repositório remoto
git push -u origin feature/nome-da-sua-feature
```

### 3. **Finalizando uma funcionalidade:**
```bash
# Atualizar com a main recente
git fetch origin
git merge origin/main

# Resolver conflitos se necessário, depois:
git push origin feature/nome-da-sua-feature
```

### 4. **Criando Pull Request (PR)**
- No GitHub, vá em "Pull Requests" -> "New Pull Request"
- Selecione: base: `main` <- compare: `feature/nome-da-sua-feature`
- Adicione revisores
- Aguarde aprovação antes do merge

---

## **Comandos Essenciais para Trabalho em Equipe**

### Visualizar o estado do repositório:
```bash
git status                  # Verifica estado atual
git log --oneline --graph  # Histórico visual
git branch -a              # Lista todas branches
```

### Gerenciamento de branches:
```bash
# Listar branches
git branch

# Criar nova branch
git checkout -b minha-feature

# Trocar de branch
git checkout nome-da-branch

# Deletar branch local
git branch -d nome-da-branch

# Deletar branch remota
git push origin --delete nome-da-branch
```

### Sincronização com repositório remoto:
```bash
# Buscar alterações sem merge
git fetch origin

# Atualizar branch local com remote
git pull origin main

# Forçar atualização (cuidado!)
git reset --hard origin/main
```

### Resolução de conflitos:
```bash
# Ver arquivos com conflito
git status

# Abrir arquivo e procurar por <<<<<<<, =======, >>>>>>>
# Editar para resolver conflitos manualmente

# Após resolver:
git add arquivo-conflitante.html
git commit -m "resolve conflitos"
```

---

                

### 1. **Commit acidental na branch main**
```bash
# Criar nova branch com os commits
git branch nova-feature
git reset --hard origin/main
```

### 2. **Conflito durante merge**
```bash
# Abrir arquivo, resolver manualmente
git add arquivo-conflitado.css
git commit -m "resolve merge conflict"
```

### 3. **Histórico bagunçado**
```bash
# Fazer rebase para limpar histórico
git rebase -i HEAD~5  # interativo com últimos 5 commits
```



