Tutorial básico de git: https://www.notion.so/GIT-GITHUB-231254d9302e8044b3b1cca361ba0311?source=copy_link


### 1. Configuração inicial (uma vez só)

```bash
git clone https://github.com/usuario/repositorio.git
cd repositorio
```
O que NÃO fazer
NUNCA FAÇA GIT INIT PORRA
❌ Não commitar diretamente na main
❌Nunca programe direto na main.
❌ Não trabalhar na mesma branch que outros
❌ Não fazer push de código quebrado
❌ Não ignorar reviews de código
---

### 2. Antes de começar a programar(branches)

Sempre crie uma branch nova para sua tarefa!!!!!!! --> IMPORTANTEEEEEE 

```bash
git checkout main        # Ir para a branch principal
git pull origin main     # primeiro puxar do repositório remoto a versão mais recente do projeto antes de começar a codar
git checkout -b feature/minha-tarefa   # Criar nova branch(ramificação) para sua tarefa, dai se vc fizer cagada não vai ter estragado o projeto por que vc fez uma ramificação dele
```

---

### 3. Durante o desenvolvimento

✅ Cada tarefa/bug/feature = 1 branch nova.
✅ Nomeie suas branches de forma clara: feature/cadastro-usuario fix/seila
✅ Sempre atualize sua branch antes do merge. 

Trabalhe apenas dentro da sua branch pelo amor de deus senhor
```bash
git add .                                 # Adicionar alterações feitas, isso adiciona TODAS, tem que por o ponto final
git commit -m "feat: descreva bem o que fez"   # Registrar alteração: detalhe o mais possível as mudanças que vc fez pq isso fica registrado tb, coloque oq tem que arrumar oq arrumou etc TUDO    
git push -u origin feature/minha-tarefa   # Enviar para o GitHub: repositório remoto. --> aqui pode dar muitos erros preste bem atenção, vai usando o git status pra entender o pq do probelma
```

faça commits pequenos e claros! e nao de uma vez 

---

### 4. Quando terminar

```bash
git fetch origin
git merge origin/main     # Mescla a sua ramificação com o original, ou seja, adiciona suas mudanças no projeto de verdade 




