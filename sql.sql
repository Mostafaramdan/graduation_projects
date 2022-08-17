DROP TABLE `projects`;
TRUNCATE `doctors`;
TRUNCATE `project_members`;
TRUNCATE `students`;
CREATE TABLE `projects` (
 `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
 `doctors_id` bigint(20) unsigned DEFAULT NULL,
 `suggested_doctors_id` bigint(20) unsigned DEFAULT NULL,
 `create_by` bigint(20) unsigned DEFAULT NULL COMMENT 'students_id',
 `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
 `progress` int(11) NOT NULL DEFAULT 0,
 `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
 `proposal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 `status` enum('pending','accept','decline','suggestByAdmin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
 `social_network` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `doctors` (`id`, `name`, `is_active`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'dr yousria ibrahim', '1', 'doctor@hti.edu.eg', NULL, '$2a$10$zNK1S6Q7Jhv68KAxO8ejB.SGUBI.DPBZlsi9GvLIQ5QgLmtoUqs8m', NULL, NULL, NULL), (NULL, 'dr yousria ibrahim', '1', 'yousria@hti.edu.eg', NULL, '$2a$10$zNK1S6Q7Jhv68KAxO8ejB.SGUBI.DPBZlsi9GvLIQ5QgLmtoUqs8m', NULL, NULL, NULL);
INSERT INTO `projects` (`id`, `doctors_id`, `suggested_doctors_id`, `create_by`, `name`, `progress`, `description`, `proposal`, `status`, `social_network`, `created_at`, `updated_at`) VALUES (NULL, '1', '1', '1', 'stackOverFlow', '79', 'Not the answer you are looking for? Browse other questions tagged laravel or ask your own question.\r\n', NULL, 'suggestByAdmin', 'facebook.com', NULL, '2022-08-17 01:12:24'), (NULL, '1', NULL, '21', 'graudation project', '40', 'asdasdasd', '/uploads/proposal/3vswP1660701199-interview.pdf.pdf', 'pending', 'facebook.com', '2022-08-17 01:53:19', '2022-08-17 02:09:17'), (NULL, '2', NULL, '21', 'consultation engineering\r\n', '40', 'yousria', '/uploads/proposal/3vswP1660701199-interview.pdf.pdf', 'pending', 'facebook.com', '2022-08-17 01:53:19', '2022-08-17 02:09:17');
INSERT INTO `project_members` (`id`, `students_id`, `projects_id`, `created_at`, `updated_at`) VALUES (NULL, '1', '1', NULL, NULL), (NULL, '21', '2', NULL, NULL), (NULL, '11', '2', NULL, NULL), (NULL, '10', '3', NULL, NULL), (NULL, '11', '3', NULL, NULL);
INSERT INTO `students` (`id`, `name`, `is_active`, `student_ID`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'hossam', '1', '42134567@hti.edu.eg', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', NULL, NULL, NULL), (NULL, 'salah', '1', '42134167@hti.edu.eg', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', NULL, NULL, NULL), (NULL, 'ibrahim', '1', '42134161@hti.edu.eg', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', NULL, NULL, NULL), (NULL, 'ali', '1', '41134567@hti.edu.eg', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', NULL, NULL, NULL), (NULL, 'aatef', '1', '41234567@hti.edu.eg', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', NULL, NULL, NULL), (NULL, 'ramdan', '1', '41334567@hti.edu.eg', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', NULL, NULL, NULL), (NULL, 'fathy', '1', '41434567@hti.edu.eg', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', NULL, NULL, NULL), (NULL, 'husien', '1', '41534567@hti.edu.eg', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', NULL, NULL, NULL), (NULL, 'ali', '1', '41634567@hti.edu.eg', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', NULL, NULL, NULL), (NULL, 'alaa', '1', '41734567@hti.edu.eg', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', NULL, NULL, NULL), (NULL, 'mamoud', '1', '41834567@hti.edu.eg', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', NULL, NULL, NULL), (NULL, 'mostafa', '1', '41934567@hti.edu.eg', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', NULL, NULL, NULL), (NULL, '3asem', '1', '42034567@hti.edu.eg', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', NULL, NULL, NULL), (NULL, 'ahmed', '1', '42334567@hti.edu.eg', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', NULL, NULL, NULL), (NULL, 'mohamed', '1', '42234567@hti.edu.eg', '$2y$10$bLck7TCSQ8zYj7bLsHIwvO3VWJNiK9xe9RS34lbhmI5iRswmYjozm', NULL, NULL, NULL);



