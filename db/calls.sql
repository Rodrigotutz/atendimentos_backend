

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


INSERT INTO `calls` (`id`, `name`, `at_number`, `email`, `entity`, `call_case`, `created_at`, `updated_at`) VALUES
(1, 'Rodrigo Tutz', '27005', 'rodrigo@rodrigotutz.com', 'PM Nhandeara', 'Cliente relata que não consegue fazer o empenho pois o sistema acusa código de erro!', '2023-06-03 22:27:21', '2023-06-03 22:27:21'),
(2, 'Marcos Castro', '88123', 'marcos@teste.com', 'PM Votuporanga', 'Cliente relata que ao finalizar licitação o sistema acusa erro', '2023-06-03 22:28:08', '2023-06-03 22:28:08'),
(3, 'Pedro Campos', '28546', 'pedro@teste.com', 'PM Carapicuíba', 'Cliente solicita ajudar para identificar parâmetros para criação de usuários no sistema', '2023-06-03 22:29:14', '2023-06-03 22:29:14'),
(4, 'Olinto Guirão', '11610', 'olinto@gmail.com', 'PM São Joaquim da Barra', 'Erro ao cadastrar processo licitatório', '2023-06-03 22:45:27', '2023-06-03 22:45:27'),
(5, 'Marcos Antônio', '415698', 'marcos@antonio.com', 'PM Monçoes', 'Cliente relata erro ao tentar imprimir relatório de receita', '2023-06-03 22:46:13', '2023-06-03 22:46:13'),
(6, 'Rodrigo Tutz', '12536', 'rodrigo@rodrigotutz.com', 'PM Nhandeara', 'Cliente relata erro ao tentar alterar layout de reltório', '2023-06-03 22:46:49', '2023-06-03 22:46:49'),
(7, 'Rodrigo Tutz', '25656', 'rodrigo@rodrigotutz.com', 'Pm Bálsamo', 'Cliente relata erro ao cadastra empenho', '2023-06-05 03:24:58', '2023-06-05 03:24:58');

ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `calls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

