-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/06/2023 às 17:33
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `atendimentos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `calls`
--

CREATE TABLE `calls` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `at_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `entity` varchar(255) NOT NULL,
  `call_case` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `calls`
--

INSERT INTO `calls` (`id`, `name`, `at_number`, `email`, `entity`, `call_case`, `created_at`, `updated_at`) VALUES
(1, 'Rodrigo Tutz', '27005', 'rodrigo@rodrigotutz.com', 'PM Nhandeara', 'Cliente relata que não consegue fazer o empenho pois o sistema acusa código de erro!', '2023-06-03 22:27:21', '2023-06-03 22:27:21'),
(2, 'Marcos Castro', '88123', 'marcos@teste.com', 'PM Votuporanga', 'Cliente relata que ao finalizar licitação o sistema acusa erro', '2023-06-03 22:28:08', '2023-06-03 22:28:08'),
(3, 'Pedro Campos', '28546', 'pedro@teste.com', 'PM Carapicuíba', 'Cliente solicita ajudar para identificar parâmetros para criação de usuários no sistema', '2023-06-03 22:29:14', '2023-06-03 22:29:14'),
(4, 'Olinto Guirão', '11610', 'olinto@gmail.com', 'PM São Joaquim da Barra', 'Erro ao cadastrar processo licitatório', '2023-06-03 22:45:27', '2023-06-03 22:45:27'),
(5, 'Marcos Antônio', '415698', 'marcos@antonio.com', 'PM Monçoes', 'Cliente relata erro ao tentar imprimir relatório de receita', '2023-06-03 22:46:13', '2023-06-03 22:46:13'),
(6, 'Rodrigo Tutz', '12536', 'rodrigo@rodrigotutz.com', 'PM Nhandeara', 'Cliente relata erro ao tentar alterar layout de reltório', '2023-06-03 22:46:49', '2023-06-03 22:46:49'),
(7, 'Rodrigo Tutz', '25656', 'rodrigo@rodrigotutz.com', 'Pm Bálsamo', 'Cliente relata erro ao cadastra empenho', '2023-06-05 03:24:58', '2023-06-05 03:24:58');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `passwd`, `created_at`, `updated_at`) VALUES
(1, 'Rodrigo', 'Antunes', 'rodrigo@rodrigotutz.com', '$2y$10$xBwLpRCZDd24QEz1MDFVeeDff/uW6cNzLLFUV.JWpctPoHsCuRJT6', '2023-06-02 23:05:26', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `calls`
--
ALTER TABLE `calls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
