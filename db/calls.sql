CREATE TABLE `calls` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `at_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `system` varchar(255) DEFAULT NULL,
  `situation` varchar(255) DEFAULT NULL,
  `entity` varchar(255) NOT NULL,
  `call_case` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `calls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
