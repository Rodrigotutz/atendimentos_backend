

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `passwd`, `created_at`, `updated_at`) VALUES
(1, 'Rodrigo', 'Antunes', 'rodrigo@rodrigotutz.com', '$2y$10$xBwLpRCZDd24QEz1MDFVeeDff/uW6cNzLLFUV.JWpctPoHsCuRJT6', '2023-06-02 23:05:26', NULL);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;