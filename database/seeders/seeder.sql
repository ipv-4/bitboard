-- 1. Seed Users
-- Note: In a real app, these passwords would be hashed. 
-- For this seed, we're using strings that 'look' like hashes for structure.
INSERT INTO users (username, email, password) VALUES 
('art_lover', 'lover@example.com', '$2y$10$nO8V.P.7WkX9y7Z8G/7uO.e6lK8fV4Y/Q2j2W5z8X4k1l2m3n4o5p'), 
('pixel_master', 'pixel@example.com', '$2y$10$nO8V.P.7WkX9y7Z8G/7uO.e6lK8fV4Y/Q2j2W5z8X4k1l2m3n4o5p'),
('benexl', 'ben@example.com', '$2y$10$nO8V.P.7WkX9y7Z8G/7uO.e6lK8fV4Y/Q2j2W5z8X4k1l2m3n4o5p');

-- 2. Seed Artworks (linked to the users created above)
INSERT INTO artworks (user_id, title, category, image_path) VALUES 
(1, 'Sunset over Docker', 'Digital Art', 'assets/images/sunset.jpg'),
(1, 'Cybernetic Forest', 'Illustration', 'assets/images/forest.png'),
(2, 'Vaporwave Dreams', 'Pixel Art', 'assets/images/vaporwave.jpg'),
(3, 'My First Bitboard', 'Sketch', 'assets/images/sketch.jpg');
