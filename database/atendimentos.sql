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


INSERT INTO `calls` (`at_number`, `name`, `email`, `entity`, `call_case`, `user_id`, `situation`, `system`, `general_error`, `created_at`, `updated_at`) VALUES
(1, 'Tutz', 'rodrigoantunestutz@gmail.com', 'PM Nhandeara', 'Teste', 1, 'Em Andamento', 'SCPI 8', 'N', '2024-03-12 16:34:23', '2024-03-12 16:34:23'),
(2, 'Tutz', 'rodrigoantunestutz@gmail.com', 'PM Nhandeara', 'Teste', 1, 'Em Andamento', 'SCPI 8', 'S', '2024-03-12 16:41:22', '2024-03-12 16:41:22'),
(3, 'Tutz', 'rodrigoantunestutz@gmail.com', 'PM Nhandeara', 'Teste', 1, 'Em Andamento', 'SCPI 8', 'S', '2024-03-12 16:41:42', '2024-03-12 16:41:42'),
(4, 'Tutz', 'rodrigoantunestutz@gmail.com', 'PM Nhandeara', 'Teste', 1, 'Em Andamento', 'SCPI 8', 'S', '2024-03-12 16:43:02', '2024-03-12 16:43:02'),
(5, 'Tutz', 'rodrigoantunestutz@gmail.com', 'PM Nhandeara', 'Teste', 1, 'Em Andamento', 'SCPI 8', 'S', '2024-03-12 16:43:19', '2024-03-12 16:43:19');

CREATE TABLE `situations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `situations` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Em Andamento', 'Sistema em testes pelo suporte responsável', '2024-03-12 14:59:44', '2024-03-12 14:59:44');


CREATE TABLE `systems` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `systems` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'SCPI 8', 'Sistema de Contabilidade Desktop', '2024-03-12 14:58:32', '2024-03-12 14:58:32');

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

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `confirm_token`, `confirmed_at`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Rodrigo', 'Tutz', 'rodrigoantunestutz@gmail.com', '$2y$10$gyMZ7ictOvYPf8AWCVgO4OxGqwYTcpC8/7XwsE9jYTkBZeMA4iXYq', NULL, '2024-03-12', 'admin', '2024-03-12 14:39:58', '2024-03-12 14:48:16');

ALTER TABLE `calls`
  ADD PRIMARY KEY (`at_number`);

ALTER TABLE `situations`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `systems`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `calls`
  MODIFY `at_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `situations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `systems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;