-- Criar o banco de dados
CREATE DATABASE IF NOT EXISTS login_system;

-- Usar o banco de dados criado
USE login_system;

-- Criar a tabela de usuários
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Inserir um usuário com senha criptografada
-- (a senha será '123', mas será criptografada usando bcrypt)
INSERT INTO users (username, password) VALUES ('teste', '$2y$10$K1b6uY.k3mHGTLzGSRBFouUgEzI4nZRCtEuGHh5.giD5cnvDQHJD2');


CREATE TABLE tipoimovel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE cidade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_cidade VARCHAR(80) NOT NULL,
    estado VARCHAR(2) NOT NULL
);


CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `cpf` varchar(18) DEFAULT NULL,
  `rg` varchar(18) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `idcidade` int(11) NOT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `fone` varchar(14) NOT NULL,
  `celular` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `aceitaspam` text NOT NULL,
  `dtnasc` date NOT NULL,
  `estcivil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcidade` (`idcidade`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`idcidade`) REFERENCES `cidade` (`id`);
COMMIT;


CREATE TABLE `imoveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcidade` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `valorvenda` decimal(12,2) DEFAULT 0.00,
  `valorlocacao` decimal(12,2) DEFAULT 0.00,
  `iptu` decimal(12,2) DEFAULT 0.00,
  `condominio` decimal(12,2) DEFAULT 0.00,
  `metragemterreno` decimal(12,2) DEFAULT 0.00,
  `metragemconstruida` decimal(12,2) DEFAULT 0.00,
  `quartos` int(11) DEFAULT 0,
  `suites` int(11) DEFAULT 0,
  `banheiros` int(11) DEFAULT 0,
  `vagasgaragem` int(11) DEFAULT 0,
  `areagourmet` int(11) DEFAULT 0,
  `piscina` int(11) DEFAULT 0,
  `churrasqueira` int(11) DEFAULT 0,
  `status` bit(1) DEFAULT b'1',
  `datacriacao` datetime DEFAULT NULL,
  `dataalteracao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcidade` (`idcidade`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `idtipo` (`idtipo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `imoveis`
--
ALTER TABLE `imoveis`
  ADD CONSTRAINT `imoveis_ibfk_1` FOREIGN KEY (`idcidade`) REFERENCES `cidades` (`id`),
  ADD CONSTRAINT `imoveis_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `imoveis_ibfk_3` FOREIGN KEY (`idtipo`) REFERENCES `tipoimovel` (`id`);
COMMIT;

