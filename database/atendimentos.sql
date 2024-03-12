-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/03/2024 às 21:10
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
  `at_number` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `entity` varchar(255) NOT NULL,
  `call_case` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `situation` varchar(255) NOT NULL,
  `system` varchar(255) NOT NULL,
  `general_error` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `calls`
--

INSERT INTO `calls` (`at_number`, `name`, `email`, `entity`, `call_case`, `user_id`, `situation`, `system`, `general_error`, `created_at`, `updated_at`) VALUES
(1, 'Tutz', 'rodrigoantunestutz@gmail.com', 'PM Nhandeara', 'Teste', 1, 'Em Andamento', 'SCPI 8', 'N', '2024-03-12 16:34:23', '2024-03-12 16:34:23'),
(2, 'Tutz', 'rodrigoantunestutz@gmail.com', 'PM Nhandeara', 'Teste', 1, 'Em Andamento', 'SCPI 8', 'S', '2024-03-12 16:41:22', '2024-03-12 16:41:22'),
(3, 'Tutz', 'rodrigoantunestutz@gmail.com', 'PM Nhandeara', 'Teste', 1, 'Em Andamento', 'SCPI 8', 'S', '2024-03-12 16:41:42', '2024-03-12 16:41:42'),
(4, 'Tutz', 'rodrigoantunestutz@gmail.com', 'PM Nhandeara', 'Teste', 1, 'Em Andamento', 'SCPI 8', 'S', '2024-03-12 16:43:02', '2024-03-12 16:43:02'),
(5, 'Tutz', 'rodrigoantunestutz@gmail.com', 'PM Nhandeara', 'Teste', 1, 'Em Andamento', 'SCPI 8', 'S', '2024-03-12 16:43:19', '2024-03-12 16:43:19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `situations`
--

CREATE TABLE `situations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `situations`
--

INSERT INTO `situations` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Em Andamento', 'Sistema em testes pelo suporte responsável', '2024-03-12 14:59:44', '2024-03-12 14:59:44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `systems`
--

CREATE TABLE `systems` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `systems`
--

INSERT INTO `systems` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'SCPI 8', 'Sistema de Contabilidade Desktop', '2024-03-12 14:58:32', '2024-03-12 14:58:32');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_token` varchar(255) DEFAULT NULL,
  `confirmed_at` date DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'guest',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `confirm_token`, `confirmed_at`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Rodrigo', 'Tutz', 'rodrigoantunestutz@gmail.com', '$2y$10$gyMZ7ictOvYPf8AWCVgO4OxGqwYTcpC8/7XwsE9jYTkBZeMA4iXYq', NULL, '2024-03-12', 'admin', '2024-03-12 14:39:58', '2024-03-12 14:48:16');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`at_number`);

--
-- Índices de tabela `situations`
--
ALTER TABLE `situations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `systems`
--
ALTER TABLE `systems`
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
  MODIFY `at_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `situations`
--
ALTER TABLE `situations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `systems`
--
ALTER TABLE `systems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
