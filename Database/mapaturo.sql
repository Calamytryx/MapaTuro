-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 07:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mapaturo`
--

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `region_id` char(5) DEFAULT NULL,
  `island_id` int(11) DEFAULT NULL,
  `food_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `province_id`, `region_id`, `island_id`, `food_name`) VALUES
(1, 1, NULL, NULL, 'Poqui Poqui  - A salad made from seaweed (locally called poqui poqui) mixed with vegetables, vinegar, and shrimp.'),
(2, 2, NULL, NULL, 'Pinakbet  - This hearty vegetable stew is a staple in Ilocos Sur. Packed with healthy, in -season vegetables like okra, eggplant, bitter melon, and winged beans, it\'s flavored with shrimp paste (bagoong) and pork belly.'),
(3, 3, NULL, NULL, 'Bagnet  - Deep -fried pork belly, a crispy and savory dish perfect with bagoong (shrimp paste) or vinegar dip.'),
(4, 4, NULL, NULL, 'Bangus  - Given Pangasinan\'s coastal location, it\'s no surprise seafood takes center stage. Bangus, or milkfish, is a beloved ingredient in many dishes. It\'s enjoyed grilled, fried, or  cooked in a flavorful vinegar and soy sauce broth.'),
(5, 5, NULL, NULL, 'Pancit Cabagan  - This thick noodle dish features miki noodles stir -fried with vegetables, Luzon is an island in the Philippines that covers 30 provinces.'),
(6, 6, NULL, NULL, 'Pancit Batil Patong  - This noodle dish is a true Cagayan Valley specialty. It features miki noodles stir -fried with carabao meat (batil), vegetables, and topped with a fried egg (patong).'),
(7, 7, NULL, NULL, 'Minatamis na Kalabaw  - This unique dish features carabao meat simmered in a sweet and savory sauce. It\'s a testament to the resourcefulness and adventurous palate of the region.'),
(8, 8, NULL, NULL, 'Longganisa  - Cagayan\'s longganisa is known for its distinct garlicky flavor and is often enjoyed with breakfast.'),
(9, 9, NULL, NULL, 'Vatukon  - This creamy fish stew made with flying fish (alupihang dagat), taro (gabi), and coconut milk is a staple in Batanes.'),
(10, 10, NULL, NULL, 'Pancit Habhab Literally translated as \"slurped noodles'),
(11, 11, NULL, NULL, 'Dinuguan - This pork stew is known for its rich, dark gravy made with pig\'s blood. It may sound intimidating to some, but the gravy is surprisingly flavorful, with a touch of bitterness balanced by spices and vegetables.'),
(12, 12, NULL, NULL, 'Taho (fresh silken tofu served with tapioca pearls and either brown sugar syrup or savory soy sauce)'),
(13, 13, NULL, NULL, 'Chicharon - (deep -fried pork belly rinds known for their crispy texture and savory pork flavor) & Pastillas de Leche (small, rolled milk candies made with carabao or cow\'s milk)'),
(14, 14, NULL, NULL, 'Bulalo - This hearty beef shank soup is a specialty of Batangas. The slow -cooked beef shank is simmered until perfectly tender, resulting in a rich and flavorful broth that\'s perfect for a cold day.'),
(15, 15, NULL, NULL, 'Inihaw na Bangus (grilled milkfish) - This is a very tangy and delicious dish that anyone can prepare easily. It goes well with a soy sauce dip and rice.'),
(16, 16, NULL, NULL, 'Sisig - (chopped and seasoned pork face and ears served on a sizzling plate) & Kare -kare (a hearty stew made with oxtail, peanut sauce, vegetables, and shrimp paste)  - Pampanga is fondly called the \"Culinary Capital of the Philippines\"\" because of these'),
(17, 17, NULL, NULL, 'Chicharon Bulaklak This deep -fried pork flower dish is a popular appetizer or snack in Rizal. The pork mesentery is deep -fried until crispy and puffy, resulting in a light and airy texture with a savory pork flavor.'),
(18, 18, NULL, NULL, 'Lechon - Quezon province is known for its excellent Lechon, a whole roasted suckling pig. The pig is meticulously seasoned and slow -roasted over charcoal or open fire, resulting in crispy skin and juicy, tender meat.'),
(19, 19, NULL, NULL, 'Sinigang na Baka - This sour and savory tamarind soup is a delicious way to enjoy beef.'),
(20, 19, NULL, NULL, 'Sinigang na Baka - is a perfect balance of tartness and savory flavors, often served with vegetables.'),
(21, 20, NULL, NULL, 'Bulalo  - This hearty beef shank soup is a Batangas specialty. The slow -cooked beef shank is simmered until perfectly tender, resulting in a rich and flavorful broth that\'s perfect for a cold day.'),
(22, 21, NULL, NULL, 'Adobo sa Dau  - While Adobo is a national dish, Cavite has its own take on it using coconut oil (duu) instead of the usual soy sauce and vinegar base. This results in a lighter, more savory version of the classic Filipino dish.'),
(23, 22, NULL, NULL, 'Sarsa - Bite -sized shrimp carefully wrapped in coconut leaves, then steamed or boiled for a flavorful and aromatic appetizer or snack.'),
(24, 23, NULL, NULL, 'Halinang Adobo - A richer and creamier take on adobo, this dish uses coconut milk and turmeric instead of the usual soy sauce and vinegar base.'),
(25, 24, NULL, NULL, 'Suplicay - A comforting fish soup packed with vegetables and banana blossoms. The banana blossoms add a touch of tanginess and interesting texture.'),
(26, 25, NULL, NULL, 'Marinduque Lumbay (Lumpia)  - This spring roll variation from Marinduque is a delightful appetizer or snack. Lumpiang Marinduque uses banana blossoms (lumbay) instead of the usual spring roll wrapper. '),
(27, 25, NULL, NULL, 'It\'s then filled with savory meat and vegetable filling, then deep -fried until crispy.'),
(28, 26, NULL, NULL, 'Crocodile Sisig  - A unique take on sisig, featuring crocodile meat instead of pork face and ears. Chopped, seasoned, and served sizzling on a hot plate, it offers a distinct flavor and chewy texture.'),
(29, 27, NULL, NULL, 'Inatata - A local seafood soup featuring fresh catches like marlin or tuna, simmered with vegetables in a flavorful broth.'),
(30, 28, NULL, NULL, 'Laing - A spicy and flavorful dish featuring taro leaves cooked in coconut milk with shrimp paste (bagoong).'),
(31, 29, NULL, NULL, 'Pangat - Similar to Albay\'s Pinangat, this dish uses coconut milk as a base but incorporates local vegetables like labong (bamboo shoots) for a unique twist.'),
(32, 30, NULL, NULL, 'Naga City Chicken Inasal - A popular dish featuring chicken marinated in local spices and grilled over charcoal, resulting in a smoky and flavorful dish.'),
(33, 31, NULL, NULL, 'Hinagdang - A refreshing local version of ceviche featuring seafood like marlin or tuna cured in vinegar, citrus, and spices.'),
(34, 32, NULL, NULL, 'Masbate Churros - A local take on the classic Spanish dessert. Masbate churros have a chewier texture and can be enjoyed with various flavorings.'),
(35, 33, NULL, NULL, 'Pinaltok - Pounded young glutinous rice cooked in woven bamboo tubes lined with banana leaves. Pinaltok offers a slightly sweet and sticky texture, perfect with savory dishes.'),
(36, 34, NULL, NULL, 'Pinikpikan - A dish that might surprise some, Pinikpikan is chicken cooked while it\'s still partially alive. It\'s a dish steeped in tradition and not for the faint of heart.'),
(37, 35, NULL, NULL, 'Etag - A traditional meat preservation method where pork is cured with salt'),
(38, 36, NULL, NULL, 'Pinikpikan - A beaten chicken is then simmered in a flavorful broth with ginger, onions, and other banana leaves. Pinaltok offers a slightly sweet and sticky texture, perfect with savory dishes.'),
(39, 37, NULL, NULL, 'Pinikpikan - A dish made from young chicken or dog meat that\'s been scalded, de -feathered, and grilled. Pinikpikan is a controversial dish due to its use of dog meat, but remains a part of Abra\'s cultural heritage.'),
(40, 38, NULL, NULL, 'Kiniing - A preserved meat dish made from pork. Unlike its cousin \"etag\"\" which is cured with salt'),
(41, 39, NULL, NULL, 'Pancit Habhab - Thin rice noodles stir -fried with chicken, pork, shrimp, and vegetables. Served with a special savory peanut sauce for dipping, this dish is a delightful combination of textures and flavors. '),
(42, 39, NULL, NULL, 'Halo -halo - A refreshing dessert made with shaved ice, sweetened beans, fruits, leche flan (custard), and topped with ube (purple yam) halaya (jam). It\'s the perfect way to cool down on a hot day!'),
(43, 40, NULL, NULL, 'Muscovado Sweet Treats  - Muscovado sweet treats from Antique province in the Philippines are delightful confections made from muscovado sugar, a type of unrefined cane sugar known for its rich flavor and caramel -like taste.'),
(44, 41, NULL, NULL, 'Chiken Inasal  - Chicken Inasal is a traditional Filipino dish, particularly popular in the Visayas region, known for its unique marinade and method of grilling.'),
(45, 41, NULL, NULL, ' The chicken is marinated in a mixture of vinegar, calamansi (a citrus fruit native to the Philippines), soy sauce, garlic, ginger, lemongrass, and annatto oil, which gives it its distinctive flavor and golden hue.'),
(46, 42, NULL, NULL, 'Diwal  - Diwal or Angel Wing Seashell this food is celebrated by its own feast the its distinctive flavor and golden hue.'),
(47, 43, NULL, NULL, 'Mango  -  Guimaras province in the Philippines is renowned for its sweet and succulent mangoes, often hailed as some of the best in the world.'),
(48, 44, NULL, NULL, 'La Paz Bachoy  - La Paz Batchoy is a noodle soup made with pork offal, crushed pork cracklings, noodles, and a flavorful broth. It\'s often garnished with green onions and served with a side of bread or puto (rice cake). '),
(49, 44, NULL, NULL, 'This dish is beloved by locals and visitors alike and has become a symbol of the culinary heritage of the region.'),
(50, 45, NULL, NULL, 'Piaya  - This unleavened flatbread is a popular delicacy across Negros Occidental. It is usually filled with muscovado but in recent years it has seen some exciting transformat'),
(51, 45, NULL, NULL, 'There are ube -flavored ones and those with mangosteen and durian fillings.'),
(52, 46, NULL, NULL, 'Sans Rival  - The pride of Dumaguete, this pastry is made basically of meringue sandwiched with cream and butter and showered with cashew nuts. Sliced akin to loaves of bread,'),
(53, 47, NULL, NULL, 'Lechon De Cebu  - Derived from the Spanish word for roasted suckling pig, Lechon is a famous delicacy in the Philippines'),
(54, 48, NULL, NULL, 'Peanut Kisses  - One of the most famous foods in Bohol, Philippines, is \"Peanut Kisses.\"\" These are small'),
(55, 49, NULL, NULL, 'Salagubang  - In Siquijor Province, Philippines, one of the most famous foods is \"Salagubang'),
(56, 50, NULL, NULL, 'Binagol  - Binagol is a sweet delicacy made from mashed taro (gabi) mixed with coconut milk, sugar, and sometimes condensed milk or chocolate. The mixture is then placed inside coconut shells, traditionally wrapped in banana leaves, and steamed until cook'),
(57, 51, NULL, NULL, 'Balbacua  - Balbacua is a hearty stew made from beef skin, tendons, and other meat cuts cooked slowly in a flavorful broth until tender and rich in flavor.'),
(58, 52, NULL, NULL, 'Suman sa Ibos  - is a type of Filipino rice cake made from glutinous rice (malagkit) cooked in coconut milk, sugar, and salt, and then wrapped tightly in young coconut leaves called ibos. The rice cakes are then steamed until cooked, resulting in a soft, '),
(59, 53, NULL, NULL, 'Moron  - Moron is another one of the famous delicacies in Leyte yet quite similar to binagol. Originating from Tacloban City, moron is a soft and sticky, smooth and a bit oily rice cake that is made of glutinous rice, known as malagkit na bigas in the '),
(60, 54, NULL, NULL, 'Bukayo  - Bukayo is a sweet delicacy made from grated coconut meat, cooked with brown sugar or molasses until it forms a sticky and caramelized consistency.'),
(61, 55, NULL, NULL, 'Tinola nga Manok  - Tinola nga Manok is a traditional Filipino chicken soup dish that features tender chicken pieces cooked in a flavorful broth infused with ginger, garlic, onions, and green papaya or chili leaves.'),
(62, 56, NULL, NULL, 'Bicol Express with a Twist - This region offers a unique take on the classic Bicol Express dish. While the base of chilies, coconut milk, and shrimp paste remains, some versions incorporate local spices or coconut cream for a slightly different flavor pro'),
(63, 57, NULL, NULL, 'Bicol Express with a Twist - This region offers a unique take on the classic Bicol Express dish. While the base of chilies, coconut milk, and shrimp paste remains, some versions incorporate local spices or coconut cream for a slightly different flavor pro'),
(64, 58, NULL, NULL, 'Nilasing na Tilapia - This dish features Tilapia fish cooked in a light and flavorful coconut milk broth flavored with ginger, lemongrass, and chilies.'),
(65, 59, NULL, NULL, 'Sarangani Seaweed Salad - A refreshing salad showcasing the region\'s bounty. Freshly harvested seaweed (lumot) is mixed with onions, tomatoes, and a light vinaigrette dressing.'),
(66, 60, NULL, NULL, 'Lechon Macau - While lechon (roasted suckling pig) is a national dish, Misamis Occidental offers a unique twist with Lechon Macau. This version features a crispy skin and a distinct sweet and savory flavor profile.'),
(67, 61, NULL, NULL, 'Lanzones - A sweet and juicy tropical fruit that the island is known for'),
(68, 62, NULL, NULL, 'Kalamay - This sticky rice dessert is a popular treat throughout the Philippines, and Misamis Oriental has its own take. Kalamay here can be made with various flavors like coconut, langka (jackfruit), and ube (purple yam).'),
(69, 63, NULL, NULL, 'Binaki (Sweet Tamales) - This delightful dessert is a specialty of Lanao del Norte. Binaki features glutinous rice cooked with coconut milk and sugar, then wrapped in banana leaves and steamed. It has a sweet and sticky texture, often enjoyed as a snack o'),
(70, 64, NULL, NULL, 'Pinakbet - This hearty vegetable stew is a staple in Bukidnon cuisine. It features various regional vegetables like okra, eggplant, string beans, and unripe jackfruit (langka) simmered in shrimp paste (bagoong) and coconut milk.'),
(71, 65, NULL, NULL, 'Kinilaw - Caraga\'s version of Kinilaw features fresh seafood like tuna or marlin marinated in a unique blend of citrus juice, vinegar, ginger, onions, chilies, and local spices for a refreshing and flavorful appetizer.'),
(72, 66, NULL, NULL, 'Tinumok - Flaked tuna cooked in a flavorful broth with vegetables like okra, eggplant, and string beans.'),
(73, 67, NULL, NULL, 'Tuna - A popular choice, prepared in various ways like grilled, kinilaw (marinated in vinegar and spices), or tinumok (cooked in a flavorful broth with vegetables).'),
(74, 68, NULL, NULL, 'Poot Poot Ginamos - This unique Surigao delicacy features tiny fish called \"poot poot\"\" cooked and preserved with brine or \"\"ginamos\"\" (fish sauce)'),
(75, 69, NULL, NULL, 'Palagsing - A delightful dessert, Palagsing is a type of suman (rice cake) made with sago palm starch, coconut milk, and sugar. It has a chewy texture and a slightly sweet flavor, often enjoyed with hot cocoa or coffee.'),
(76, 70, NULL, NULL, 'Kinilaw - A refreshing appetizer featuring raw, cubed seafood (usually tuna or mackerel) marinated in vinegar, citrus juice, ginger, onions, and chilies. Davao\'s version is known for its generous use of chilies, offering a delightful balance of sweet, sou'),
(77, 71, NULL, NULL, 'Kinilaw - A refreshing appetizer featuring raw, cubed seafood (usually tuna or mackerel) marinated in vinegar, citrus juice, ginger, onions, and chilies. Davao\'s version is known for its generous use of chilies, offering a delightful balance of sweet, sou'),
(78, 72, NULL, NULL, 'Tinola with Budbud (Wild Fern) - This dish showcases the region\'s unique ingredients. Marilog offers a twist on the classic Tinola soup by using budbud (a type of wild fern) alongside chicken or other meat.'),
(79, 73, NULL, NULL, 'Kinilaw - A refreshing appetizer featuring raw, cubed seafood (usually tuna or mackerel) marinated in vinegar, citrus juice, ginger, onions, and chilies. Davao\'s version is known for its generous use of chilies, offering a delightful balance of sweet, sou'),
(80, 74, NULL, NULL, 'Kinilaw - A refreshing appetizer featuring raw, cubed seafood (usually tuna or mackerel) marinated in vinegar, citrus juice, ginger, onions, and chilies. Davao\'s version is known for its generous use of chilies, offering a delightful balance of sweet, sou'),
(81, 75, NULL, NULL, 'Lininggil  - A flavorful chicken and coconut milk dish seasoned with \"palapa\"\" (a spiced coconut mixture).\"'),
(82, 76, NULL, NULL, 'Pastil (Maguindanao & Lanao del Sur) - A versatile dish enjoyed as a snack or a main course. It features flaky pastry filled with savory ingredients like rice, meat (chicken or fish), and vegetables.'),
(83, 77, NULL, NULL, 'Lininggil - This popular dish features chicken and fresh coconut milk seasoned with palapa (a spiced coconut mixture with chilies, onions, and other herbs) It\'s a flavorful and satisfying main course.'),
(84, 78, NULL, NULL, 'Lininggil - This popular dish features chicken and fresh coconut milk seasoned with palapa (a spiced coconut mixture with chilies, onions, and other herbs) It\'s a flavorful and satisfying main course.'),
(85, 79, NULL, NULL, 'Pastil - This versatile dish can be enjoyed as a snack or a main course. It features flaky pastry filled with savory ingredients like rice, meat (chicken or fish), and vegetables.'),
(86, 80, NULL, NULL, 'Tapay (Fermented Rice) - A staple food with a slightly sour and tangy flavor, often eaten for breakfast or as a snack.'),
(87, 81, NULL, NULL, 'Satti - Skewered and grilled meats, usually chicken or beef, marinated in a flavorful blend of spices like turmeric, paprika, and chilies. Satti is a popular street food and appetizer enjoyed with peanut sauce and satay sauce.'),
(88, 82, NULL, NULL, 'Satti - Skewered and grilled meats, usually chicken or beef, marinated in a flavorful blend of spices like turmeric, paprika, and chilies. Satti is a popular street food and appetizer enjoyed with peanut sauce and satay sauce.'),
(89, 83, NULL, NULL, 'Satti - Skewered and grilled meats, usually chicken or beef, marinated in a flavorful blend of spices like turmeric, paprika, and chilies. Satti is a popular street food and appetizer enjoyed with peanut sauce and satay sauce.'),
(90, NULL, NULL, 1, 'Kare-kare - is a rich and savory stew made with oxtail, pork belly, peanuts, vegetables like eggplant and string beans, and a thick peanut sauce.'),
(91, NULL, NULL, 2, 'Kinilaw  (similar to ceviche) - is a refreshing and flavorful dish made with fresh seafood (like tuna, shrimp, or scallops) cured in vinegar, citrus juices, chilies, ginger, and onions. '),
(92, NULL, NULL, 3, 'Sinuglaw -  is a Mindanao and Visayan specialty that combines two well-loved Filipino dishes -  \"sinugba\"\" (grilled meat) and \"\"kinilaw\"\" (seafood cured in vinegar or citrus juices). \"'),
(93, NULL, NULL, 4, 'Adobo - It\'s a dish made with chicken, pork, or even vegetables marinated in a savory sauce of vinegar, soy sauce, garlic, peppercorns, and bay leaves.'),
(94, NULL, 'BARMM', 0, 'Palabok -  A noodle dish made with thin rice noodles, stir-fried with pork, shrimp, and vegetables in a savory shrimp sauce. '),
(95, NULL, 'CAR', NULL, 'Pinikpikan - This unique dish, a specialty of the Ifugao people, might be for the adventurous eater. It features chicken or dog meat that\'s been descaled, lightly beaten with a stick, and then grilled.'),
(96, NULL, '1', NULL, 'Pinakbet (Ilocos version) - This vegetable stew is a staple, but the Ilocos version incorporates \"bagoong monamon\"\" (fermented shrimp paste) for a unique savory kick. It features vegetables like eggplant'),
(97, NULL, '2', NULL, 'Pancit Batil Patong - This dish is considered the unofficial pancit (noodle) capital of Cagayan.  It\'s a vibrantly colored noodle dish featuring carabao meat (carabao is a water buffalo), vegetables, longganisa (sausage), and shrimp, all stir-fried togeth'),
(98, NULL, '3', NULL, 'Sisig - This dish, while not exclusive to Region 3, is often considered its crown jewel.  Originating from Pampanga, sisig is a sizzling plate of chopped pig\'s face and ears, seasoned with onions, chilies, and calamansi (a citrus fruit similar to a lime).'),
(99, NULL, '4A', NULL, 'Pancit Pusit - Black squid noodles stir-fried with vegetables and seafood, a specialty of Cavite.'),
(100, NULL, '4B', NULL, 'Adobong Mani - A unique take on Adobo featuring peanut butter instead of soy sauce, resulting in a rich and nutty flavored dish.'),
(101, NULL, '5', NULL, 'Bicol Express - A fiery pork dish cooked with shrimp paste (bagoong), coconut milk, chilies (siling labuyo), and various aromatics. Bicol Express is known for its bold and spicy flavors, with a level of heat that can be adjusted based on preference.'),
(102, NULL, '6', NULL, 'Kansi - A sour and savory soup made with shrimp paste, vegetables, and oftentimes either tangigue (king mackerel) or bonefish.'),
(103, NULL, '7', NULL, 'Sinigang - A sour and savory soup, a staple in Filipino cuisine. Cebu offers its own variations, such as Sinigang sa Isda (fish), Sinigang sa Hipon (shrimp), and Sinigang sa Mango (unripe mango).'),
(104, NULL, '8', NULL, 'Leyte Chocolate Moron - A unique dessert made with malagkit (glutinous rice), tablea (cocoa tablets), and coconut milk, resulting in a rich and chewy treat.'),
(105, NULL, '9', NULL, 'Chicken Inasal -  A  local  favorite  throughout  the  Philippines,  featuring  chicken  skewered  and  marinated  in  achuete  oil  before  being  grilled  over  charcoal  to  perfection. '),
(106, NULL, '10', NULL, 'Sinuglaw - A tangy and savory dish featuring grilled marinated pork and seafood like tuna or tanigue, served with a mixture of chopped onions, tomatoes, chili peppers, and calamansi (citrus fruit similar to lime).'),
(107, NULL, '11', NULL, 'Pastil - A savory dish featuring ground meat and vegetables wrapped in wonton wrappers and deep-fried until golden brown.'),
(108, NULL, '12', NULL, 'Seaweed Salad - A refreshing and healthy salad featuring various seaweeds like lato (sea grapes) and gulfweed, tossed in a light vinegar dressing with onions, chilies, and calamansi.'),
(109, NULL, '13', NULL, 'Sinigang - A sour and savory soup, a staple in Filipino cuisine. Caraga offers its own variations, such as Sinigang sa Isda (fish), Sinigang sa Hipon (shrimp), and Sinigang sa Mango (unripe mango).'),
(110, NULL, 'NCR', NULL, 'Adobo - A national dish of the Philippines made with meat (usually chicken, pork, or seafood), soy sauce, vinegar, garlic, peppercorns, and bay leaves. ');

-- --------------------------------------------------------

--
-- Table structure for table `game_metrics`
--

CREATE TABLE `game_metrics` (
  `id` int(11) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `region_id` char(5) DEFAULT NULL,
  `island_id` int(11) DEFAULT NULL,
  `game_mode` varchar(255) DEFAULT NULL,
  `is_correct` char(1) DEFAULT NULL,
  `guess_count` tinyint(1) DEFAULT NULL,
  `time_taken` int(11) DEFAULT NULL,
  `date_and_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `geography`
--

CREATE TABLE `geography` (
  `id` int(11) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `region_id` char(5) DEFAULT NULL,
  `island_id` int(11) DEFAULT NULL,
  `geography_info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `geography`
--

INSERT INTO `geography` (`id`, `province_id`, `region_id`, `island_id`, `geography_info`) VALUES
(632, 1, '', 0, 'The province has a land area of 3,418.75 square kilometers or 1,319.99 square miles'),
(633, 2, '', 0, 'The province has a land area of 2,596.00 square kilometers'),
(634, 3, '', 0, 'The province has a land area of 1,497.70 square kilometers'),
(635, 4, '', 0, 'The province has a land area of 5,368 square kilometers'),
(636, 5, '', 0, 'The province has a land area of 12,414.93 square kilometers'),
(637, 6, '', 0, 'The province has a land area of 3,339.75 square kilometers'),
(638, 7, '', 0, 'The province has a land area of 4,888.60 square kilometers'),
(639, 8, '', 0, 'The province has a land area of 9,850.75 square kilometers'),
(640, 9, '', 0, 'The province has a land area of 219.00 square kilometers'),
(641, 10, '', 0, 'The province has a land area of 3,878.30 square kilometers'),
(642, 11, '', 0, 'The province has a land area of 5,755.76 square kilometers'),
(643, 12, '', 0, 'The province has a land area of 3,430.00 square kilometers'),
(644, 13, '', 0, 'The province has a land area of 3,433.50 square kilometers'),
(645, 14, '', 0, 'The province has a land area of 1,387.00 square kilometers'),
(646, 15, '', 0, 'The province has a land area of 3,878.39 square kilometers'),
(647, 16, '', 0, 'The province has a land area of 2,181.40 square kilometers'),
(648, 17, '', 0, 'The province has a land area of 1,300.00 square kilometers'),
(649, 18, '', 0, 'The province has a land area of 9,288.25 square kilometers'),
(650, 19, '', 0, 'The province has a land area of 1,759.00 square kilometers'),
(651, 20, '', 0, 'The province has a land area of 3,101.70 square kilometers'),
(652, 21, '', 0, 'The province has a land area of 1,248.86 square kilometers'),
(653, 22, '', 0, 'The province has a land area of 1,533.45 square kilometers'),
(654, 23, '', 0, 'The province has a land area of 2,361.00 square kilometers'),
(655, 24, '', 0, 'The province has a land area of 5,879.91 square kilometers'),
(656, 25, '', 0, 'The province has a land area of 959.89 square kilometers'),
(657, 26, '', 0, 'The province has a land area of 14,640.4 square kilometers'),
(658, 27, '', 0, 'The province has a land area of 2,118.00 square kilometers'),
(659, 28, '', 0, 'The province has a land area of 2,755.70 square kilometers'),
(660, 29, '', 0, 'The province has a land area of 3,343.00 square kilometers'),
(661, 30, '', 0, 'The province has a land area of 5,476.70 square kilometers'),
(662, 31, '', 0, 'The province has a land area of 1,564.10 square kilometers'),
(663, 32, '', 0, 'The province has a land area of 4,415.70 square kilometers'),
(664, 33, '', 0, 'The province has a land area of 2,072.00 square kilometers'),
(665, 34, '', 0, 'The province has a land area of 3,229.75 square kilometers'),
(666, 35, '', 0, 'The province has a land area of 2,097.00 square kilometers'),
(667, 36, '', 0, 'The province has a land area of 4,413.00 square kilometers'),
(668, 37, '', 0, 'The province has a land area of 1,829.00 square kilometers'),
(669, 38, '', 0, 'The province has a land area of 2,866.00 square kilometers'),
(670, 39, '', 0, 'The province has a land area of 638.55 square kilometers'),
(671, 40, '', 0, 'The province has a land area of 2,709.40 square kilometers'),
(672, 41, '', 0, 'The province has a land area of 1,817.90 square kilometers'),
(673, 42, '', 0, 'The province has a land area of 2,533.20 square kilometers'),
(674, 43, '', 0, 'The province has a land area of 644.70 square kilometers'),
(675, 44, '', 0, 'The province has a land area of 5,788.00 square kilometers'),
(676, 45, '', 0, 'The province has a land area of 7,800.00 square kilometers'),
(677, 46, '', 0, 'The province has a land area of 5,360.00 square kilometers'),
(678, 47, '', 0, 'The province has a land area of 4,467.00 square kilometers'),
(679, 48, '', 0, 'The province has a land area of 4,821.00 square kilometers'),
(680, 49, '', 0, 'The province has a land area of 343.00 square kilometers'),
(681, 50, '', 0, 'The province has a land area of 536.00 square kilometers'),
(682, 51, '', 0, 'The province has a land area of 6,044.00 square kilometers'),
(683, 52, '', 0, 'The province has a land area of 4,662.00 square kilometers'),
(684, 53, '', 0, 'The province has a land area of 5,361.00 square kilometers'),
(685, 54, '', 0, 'The province has a land area of 1,799.00 square kilometers'),
(686, 55, '', 0, 'The province has a land area of 5,006.39 square kilometers'),
(687, 56, '', 0, 'The province has a land area of 9,586.43 square kilometers'),
(688, 57, '', 0, 'The province has a land area of 4,844.00 square kilometers'),
(689, 58, '', 0, 'The province has a land area of 4,425.00 square kilometers'),
(690, 59, '', 0, 'The province has a land area of 3,600.00 square kilometers'),
(691, 60, '', 0, 'The province has a land area of 4,867.23 square kilometers'),
(692, 61, '', 0, 'The province has a land area of 237.90 square kilometers'),
(693, 62, '', 0, 'The province has a land area of 3,329.00 square kilometers'),
(694, 63, '', 0, 'The province has a land area of 3,820.00 square kilometers'),
(695, 64, '', 0, 'The province has a land area of 10,495.19 square kilometers'),
(696, 65, '', 0, 'The province has a land area of 1,036.34 square kilometers'),
(697, 66, '', 0, 'The province has a land area of 8,966.00 square kilometers'),
(698, 67, '', 0, 'The province has a land area of 2,592.00 square kilometers'),
(699, 68, '', 0, 'The province has a land area of 2,253.80 square kilometers'),
(700, 69, '', 0, 'The province has a land area of 4,552.00 square kilometers'),
(701, 70, '', 0, 'The province has a land area of 5,164.00 square kilometers'),
(702, 71, '', 0, 'The province has a land area of 5,581.89 square kilometers'),
(703, 72, '', 0, 'The province has a land area of 5,677.57 square kilometers '),
(704, 73, '', 0, 'The province has a land area of 4,666.03 square kilometers'),
(705, 74, '', 0, 'The province has a land area of 3,426.97 square kilometers'),
(706, 75, '', 0, 'The province has a land area of 3,492.67 square kilometers'),
(707, 76, '', 0, 'The province has a land area of 1,600.40 square kilometers'),
(708, 77, '', 0, 'The province has a land area of 4,973 square kilometers'),
(709, 78, '', 0, 'The province has a land area of 3,989 square Kilometers'),
(710, 79, '', 0, 'The province has a land area of 12,049.03 square kilometers'),
(711, 80, '', 0, 'The province has a land area of 3,656.00 square kilometers'),
(712, 81, '', 0, 'The province has a land area of 7,301.00 square kilometers'),
(713, 82, '', 0, 'The province has a land area of 4,499.70 square kilometers'),
(714, 83, '', 0, 'The province has a land area of 3,607.78 square kilometers'),
(715, 0, '', 1, 'Luzon has an approximate area of 109,846.27 square kilometers or 42,411.69 square miles, and roughly has a coastline length of 5,154.40 kilometers or 3,202.80 miles.'),
(716, 0, '', 1, 'The island is situated at approximately 15.5921, 120.7400.'),
(717, 0, '', 2, 'Visayas region is located in central Philippines, with a total land area of 71,503 km2 (27,607 sq mi).]'),
(718, 0, '', 3, 'Mindanao is the second-largest island in the Philippines, boasting an area of approximately 97,530 square kilometers.'),
(719, 0, '', 4, 'The Philippines has a total land area of approximately 300,000 square kilometers (115,831 square miles)'),
(720, 0, 'BARMM', 0, 'The size of BARMM is approximately 12,711.79 square kilometers.'),
(721, 0, 'CAR', 0, 'The Cordillera Administrative Region (CAR) covers an area of approximately 18,294 square kilometers.'),
(722, 0, '1', 0, 'Region I - Ilocos Region: 25,766 sq km'),
(723, 0, '2', 0, 'Region II - Cagayan Valley: 33,203 sq km'),
(724, 0, '3', 0, 'Region III - Central Luzon: 32,393 sq km'),
(725, 0, '4A', 0, 'Region IV-A - CALABARZON: 16,701 sq km (you already knew this)'),
(726, 0, '4B', 0, 'Region IV-B - MIMAROPA Region: 12,114 sq km'),
(727, 0, '5', 0, 'Region IX - Zamboanga Peninsula: 17,017 sq km'),
(728, 0, '6', 0, 'Region V - Bicol Region: 17,070 sq km'),
(729, 0, '7', 0, 'Region VI - Western Visayas: 20,276 sq km'),
(730, 0, '8', 0, 'Region VII - Central Visayas: 15,870 sq km'),
(731, 0, '9', 0, 'Region - VII - Eastern Visayas:  23,251.10 sq km'),
(732, 0, '10', 0, 'Region X - Northern Mindanao: 24,235 sq km'),
(733, 0, '11', 0, 'Region XI - Davao Region: 20,244 sq km'),
(734, 0, '12', 0, 'Region XII - SOCCSKSARGEN: 18,427 sq km'),
(735, 0, '13', 0, 'Region XIII - Caraga: 21,426 sq km'),
(736, 0, 'NCR', 0, 'The National Capital Region (NCR), also known as Metro Manila, has an area of approximately 636 square kilometers.');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `region_id` char(5) DEFAULT NULL,
  `island_id` int(11) DEFAULT NULL,
  `information` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `province_id`, `region_id`, `island_id`, `information`) VALUES
(1, NULL, NULL, 1, 'Luzon is an island in the Philippines that covers 30 provinces.'),
(2, NULL, NULL, 2, 'Visayas is one of the three island group of the Philippines, located at the middle part of the country.'),
(3, NULL, NULL, 3, 'Mindanao is the last main island of the Philippines, located at the southern part of the country.'),
(4, NULL, 'BARMM', NULL, 'Bangsamoro Autonomous Region in Muslim Mindanao, is an administrative region in the Philippines grouped under the Mindanao island group.'),
(5, NULL, 'BARMM', NULL, 'The regional center is the City of Cotabato.'),
(6, NULL, 'CAR', NULL, 'Cordillera Administrative Region, is an administrative region in the Philippines occupying the northern-central section of Luzon.'),
(7, NULL, 'CAR', NULL, 'The regional center is the City of Baguio.'),
(8, NULL, 'NCR', NULL, 'NATIONAL CAPITAL REGION (NCR), is the capital region of the Philippines.'),
(9, NULL, 'NCR', NULL, 'NCR is composed of 16 cities and one municipality.'),
(10, NULL, '1', NULL, 'REGION I is an administrative region in the Philippines, situated in the northwestern part of Luzon. '),
(11, NULL, '1', NULL, 'The regional center is San Fernando, La Union.'),
(12, NULL, '2', NULL, 'REGION II Is an administrative region in the Philippines, situated in the northeastern part of Luzon.'),
(13, NULL, '2', NULL, 'The regional center is Tuguegarao City.'),
(14, NULL, '3', NULL, 'REGION III Is an administrative region in the Philippines, situated in the central part of Luzon.'),
(15, NULL, '3', NULL, 'The regional center is San Fernando, Pampanga.'),
(16, NULL, '4A', NULL, 'REGION IV-A, Also known as CALABARZON, is an administrative region in the Philippines located in the southwestern part of Luzon.'),
(17, NULL, '4A', NULL, 'The regional center is Calamba City.'),
(18, NULL, '4B', NULL, 'REGION IV-B, Also known as MIMAROPA, is an administrative region in the Philippines located in the southwestern part of Luzon.'),
(19, NULL, '4B', NULL, 'The regional center is Calapan City.'),
(20, NULL, '9', NULL, 'REGION IX, Also known as the Zamboanga Peninsula, is an administrative region in the Philippines located in the western part of Mindanao.'),
(21, NULL, '9', NULL, 'The regional center is Pagadian City.'),
(22, NULL, '5', NULL, 'REGION V is an administrative region in the Philippines, grouped under the Luzon island group.'),
(23, NULL, '5', NULL, 'The regional center is the City of Legazpi.'),
(24, NULL, '6', NULL, 'REGION VI,  is an administrative region in the Philippines located in the western part of the Visayas island group.'),
(25, NULL, '6', NULL, 'The regional center is Iloilo City.'),
(26, NULL, '7', NULL, 'REGION VII, Also known as Central Visayas, is an administrative region in the Philippines located in the central part of the Visayas island group.'),
(27, NULL, '7', NULL, 'The regional center is Cebu City.'),
(28, NULL, '8', NULL, 'REGION VIII, Also known as Eastern Visayas, is an administrative region in the Philippines located in the eastern part of the Visayas island group.'),
(29, NULL, '8', NULL, 'The regional center is Tacloban City.'),
(30, NULL, '10', NULL, 'REGION X, Also known as Northern Mindanao, is an administrative region in the Philippines located in the northern part of Mindanao.'),
(31, NULL, '10', NULL, 'The regional center is Cagayan de Oro City.'),
(32, NULL, '11', NULL, 'REGION XI, Also known as Davao Region, is an administrative region in the Philippines located in the southeastern part of Mindanao.'),
(33, NULL, '11', NULL, 'The regional center is Davao City.'),
(34, NULL, '12', NULL, 'REGION XII, Also known as SOCCSKSARGEN, is an administrative region in the Philippines located in the central part of Mindanao.'),
(35, NULL, '12', NULL, 'The regional center is Koronadal City.'),
(36, NULL, '13', NULL, 'REGION XIII, Also known as CARAGA, is an administrative region in the Philippines situated in the northeastern part of Mindanao.'),
(37, NULL, '13', NULL, 'The regional center is Butuan City.'),
(38, 1, NULL, NULL, 'A province in the Philippines located in the Ilocos Region on the island of Luzon.'),
(39, 1, NULL, NULL, 'Its capital is Laoag City.'),
(40, 2, NULL, NULL, 'A province in the Philippines located in the Ilocos Region on the island of Luzon.'),
(41, 2, NULL, NULL, 'Its capital is Vigan City.'),
(42, 3, NULL, NULL, 'A province in the Philippines located in the Ilocos Region on the island of Luzon.'),
(43, 3, NULL, NULL, 'Its capital is San Fernando City.'),
(44, 4, NULL, NULL, 'A province in the Philippines located in the Ilocos Region on the island of Luzon.'),
(45, 4, NULL, NULL, 'Its capital is Lingayen.'),
(46, 5, NULL, NULL, 'A province in the Philippines located in the Cagayan Valley region.'),
(47, 5, NULL, NULL, 'Its capital is Ilagan City.'),
(48, 6, NULL, NULL, 'A province in the Philippines located in the Cagayan Valley region.'),
(49, 6, NULL, NULL, 'Its capital is Cabarroguis.'),
(50, 7, NULL, NULL, 'A province in the Philippines located in the Cagayan Valley region.'),
(51, 7, NULL, NULL, 'Its capital is Bayombong.'),
(52, 8, NULL, NULL, 'A province in the Philippines located in the Cagayan Valley region.'),
(53, 8, NULL, NULL, 'Its capital is Tuguegarao City.'),
(54, 9, NULL, NULL, 'An island province in the Philippines located in the Cagayan Valley region.'),
(55, 9, NULL, NULL, 'Its capital is Basco.'),
(56, 10, NULL, NULL, 'A province in the Philippines located in the Central Luzon region.'),
(57, 10, NULL, NULL, 'Its capital is Baler.'),
(58, 11, NULL, NULL, 'A province in the Philippines located in the Central Luzon region.'),
(59, 11, NULL, NULL, 'Its capital is Palayan City.'),
(60, 12, NULL, NULL, 'A province in the Philippines located in the Central Luzon region.'),
(61, 12, NULL, NULL, 'Its capital is Tarlac City.'),
(62, 13, NULL, NULL, 'A province in the Philippines located in the Central Luzon region.'),
(63, 13, NULL, NULL, 'Its capital is Malolos.'),
(64, 14, NULL, NULL, 'A province in the Philippines located in the Central Luzon region.'),
(65, 14, NULL, NULL, 'Its capital is Balanga.'),
(66, 15, NULL, NULL, 'A province in the Philippines located in the Central Luzon region.'),
(67, 15, NULL, NULL, 'Its capital is Iba.'),
(68, 16, NULL, NULL, 'A province in the Philippines located in the Central Luzon region.'),
(69, 16, NULL, NULL, 'Its capital is San Fernando.'),
(70, 17, NULL, NULL, 'A province in the Philippines located in the CALABARZON region.'),
(71, 17, NULL, NULL, 'Its capital is Antipolo City.'),
(72, 18, NULL, NULL, 'A province in the Philippines located in the CALABARZON region.'),
(73, 18, NULL, NULL, 'Its capital is Lucena City.'),
(74, 19, NULL, NULL, 'A province in the Philippines located in the CALABARZON region.'),
(75, 19, NULL, NULL, 'Its capital is Santa Cruz.'),
(76, 20, NULL, NULL, 'A province in the Philippines located in the CALABARZON region.'),
(77, 20, NULL, NULL, 'Its capital is Batangas City.'),
(78, 21, NULL, NULL, 'A province in the Philippines located in the CALABARZON region.'),
(79, 21, NULL, NULL, 'Its capital is Trece Martires City.'),
(80, 22, NULL, NULL, 'A province in the Philippines located in the MIMAROPA region.'),
(81, 22, NULL, NULL, 'Its capital is Romblon.'),
(82, 23, NULL, NULL, 'A province in the Philippines located in the MIMAROPA region.'),
(83, 23, NULL, NULL, 'Its capital is Calapan City.'),
(84, 24, NULL, NULL, 'A province in the Philippines located in the MIMAROPA region.'),
(85, 24, NULL, NULL, 'Its capital is Mamburao.'),
(86, 25, NULL, NULL, 'An island province in the Philippines located in the MIMAROPA region.'),
(87, 25, NULL, NULL, 'Its capital is Boac.'),
(88, 26, NULL, NULL, 'A province in the Philippines located in the MIMAROPA region.'),
(89, 26, NULL, NULL, 'Its capital is Puerto Princesa City.'),
(90, 27, NULL, NULL, 'A province in the Bicol Region.'),
(91, 27, NULL, NULL, 'Its capital is the City of Sorsogon.'),
(92, 28, NULL, NULL, 'A province in the Bicol Region.'),
(93, 28, NULL, NULL, 'Its capital is Legazpi City.'),
(94, 29, NULL, NULL, 'A province in the Bicol Region.'),
(95, 29, NULL, NULL, 'Its capital is  Daet.'),
(96, 30, NULL, NULL, 'A province in the Bicol Region located on Luzon.'),
(97, 30, NULL, NULL, 'Its capital is Pili.'),
(98, 31, NULL, NULL, 'The 12th -largest island province in the Philippines, located in the Bicol Region.'),
(99, 31, NULL, NULL, 'Virac is its capital.'),
(100, 32, NULL, NULL, 'A province in the Bicol Region.'),
(101, 32, NULL, NULL, 'Its capital is the City of Masbate.'),
(102, 33, NULL, NULL, 'A landlocked province in the Cordillera Administrative Region.'),
(103, 33, NULL, NULL, 'Lagawe is the capital.'),
(104, 34, NULL, NULL, 'A landlocked province in the Cordillera Administrative Region.'),
(105, 34, NULL, NULL, 'Its capital is Tabuk City.'),
(106, 35, NULL, NULL, 'A landlocked province in the Cordillera Administrative Region.'),
(107, 35, NULL, NULL, 'Bontoc is the capital.'),
(108, 36, NULL, NULL, 'A landlocked province in the Cordillera Administrative Region.'),
(109, 36, NULL, NULL, 'Its capital is Kabugao.'),
(110, 37, NULL, NULL, 'A landlocked province in the Cordillera Administrative Region.'),
(111, 37, NULL, NULL, 'Its capital is Bangued.'),
(112, 38, NULL, NULL, 'A landlocked province in the Cordillera Administrative Region.'),
(113, 38, NULL, NULL, 'La Trinidad is the capital.'),
(114, 39, NULL, NULL, 'It is the country\'s center of commerce, education, and government.'),
(115, 39, NULL, NULL, 'Metro Manila is composed of 16 cities and one municipality.'),
(116, 40, NULL, NULL, 'A province in the Philippines located in the Western Visayas region.'),
(117, 40, NULL, NULL, 'Its capital is San Jose.'),
(118, 41, NULL, NULL, 'A province in the Philippines located in the Western Visayas region.'),
(119, 41, NULL, NULL, 'Its capital is Kalibo.'),
(120, 42, NULL, NULL, 'A province in the Philippines located in the Western Visayas region.'),
(121, 42, NULL, NULL, 'Its capital is Roxas City.'),
(122, 43, NULL, NULL, 'An island province in the Philippines located in the Western Visayas region.'),
(123, 43, NULL, NULL, 'Its capital is Jordan.'),
(124, 44, NULL, NULL, 'A province in the Philippines located in the Western Visayas region.'),
(125, 44, NULL, NULL, 'Its capital is Iloilo City.'),
(126, 45, NULL, NULL, 'A province in the Philippines located in the Western Visayas region.'),
(127, 45, NULL, NULL, 'Its capital is Bacolod.'),
(128, 46, NULL, NULL, 'A province in the Philippines located in the Central Visayas region.'),
(129, 46, NULL, NULL, 'Its capital is Dumaguete City.'),
(130, 47, NULL, NULL, 'A province in the Philippines located in the Central Visayas region.'),
(131, 47, NULL, NULL, 'Its capital is Cebu City.'),
(132, 48, NULL, NULL, 'A province in the Philippines located in the Central Visayas region.'),
(133, 48, NULL, NULL, 'Its capital is Tagbilaran City.'),
(134, 49, NULL, NULL, 'An island province in the Philippines located in the Central Visayas region.'),
(135, 49, NULL, NULL, 'Its capital is Siquijor.'),
(136, 50, NULL, NULL, 'A province in the Philippines located in the Eastern Visayas region.'),
(137, 50, NULL, NULL, 'Its capital is Naval.'),
(138, 51, NULL, NULL, 'A province in the Philippines located in the Eastern Visayas region.'),
(139, 51, NULL, NULL, 'Its capital is Catbalogan City.'),
(140, 52, NULL, NULL, 'A province in the Philippines located in the Eastern Visayas region.'),
(141, 52, NULL, NULL, 'Its capital is Borongan City.'),
(142, 53, NULL, NULL, 'A province in the Philippines located in the Eastern Visayas region.'),
(143, 53, NULL, NULL, 'Its capital is Tacloban City.'),
(144, 54, NULL, NULL, 'A province in the Philippines located in the Eastern Visayas region.'),
(145, 54, NULL, NULL, 'Its capital is Maasin City.'),
(146, 55, NULL, NULL, 'A province in the Philippines located in the Eastern Visayas region.'),
(147, 55, NULL, NULL, 'Its capital is Catarman.'),
(148, 56, NULL, NULL, 'A province in the Philippines located in the SOCCSKSARGEN region.'),
(149, 56, NULL, NULL, 'Its capital is Kidapawan City.'),
(150, 57, NULL, NULL, 'A province in the Philippines located in the SOCCSKSARGEN region.'),
(151, 57, NULL, NULL, 'Its capital is Isulan.'),
(152, 58, NULL, NULL, 'A province in the Philippines located in the SOCCSKSARGEN region.'),
(153, 58, NULL, NULL, 'Its capital is Koronadal City'),
(154, 59, NULL, NULL, 'A province in the Philippines located in the SOCCSKSARGEN region.'),
(155, 59, NULL, NULL, 'Its capital is Alabel.'),
(156, 60, NULL, NULL, 'A province in the Philippines located in the Northern Mindanao region.'),
(157, 60, NULL, NULL, 'Its capital is Oroquieta City.'),
(158, 61, NULL, NULL, 'An island province in the Philippines located in the Northern Mindanao region.'),
(159, 61, NULL, NULL, 'Its capital is Mambajao.'),
(160, 62, NULL, NULL, 'A province in the Philippines located in the Northern Mindanao region.'),
(161, 62, NULL, NULL, 'Its capital is Cagayan de Oro City.'),
(162, 63, NULL, NULL, 'A province in the Philippines located in the Northern Mindanao region.'),
(163, 63, NULL, NULL, 'Its capital is Tubod.'),
(164, 64, NULL, NULL, 'A province in the Philippines located in the Northern Mindanao region.'),
(165, 64, NULL, NULL, 'Its capital is Malaybalay City.'),
(166, 65, NULL, NULL, 'A province in the Philippines located in the CARAGA region.'),
(167, 65, NULL, NULL, 'Its capital is San Jose.'),
(168, 66, NULL, NULL, 'A province in the Philippines located in the CARAGA region.'),
(169, 66, NULL, NULL, 'Its capital is Prosperidad.'),
(170, 67, NULL, NULL, 'A province in the Philippines located in the CARAGA region.'),
(171, 67, NULL, NULL, 'Its capital is Cabadbaran City.'),
(172, 68, NULL, NULL, 'A province in the Philippines located in the CARAGA region.'),
(173, 68, NULL, NULL, 'Its capital is Surigao City.'),
(174, 69, NULL, NULL, 'A province in the Philippines located in the CARAGA region.'),
(175, 69, NULL, NULL, 'Its capital is Tandag.'),
(176, 70, NULL, NULL, 'A province in the Philippines located in the Davao Region.'),
(177, 70, NULL, NULL, 'Its capital is Malita.'),
(178, 71, NULL, NULL, 'A province in the Philippines located in the Davao Region.'),
(179, 71, NULL, NULL, 'Its capital is Digos City.'),
(180, 72, NULL, NULL, 'A province in the Philippines located in the Davao Region.'),
(181, 72, NULL, NULL, 'Its capital is Mati City.'),
(182, 73, NULL, NULL, 'A province in the Philippines located in the Davao Region.'),
(183, 73, NULL, NULL, 'Its capital is Nabunturan.'),
(184, 74, NULL, NULL, 'A province in the Philippines located in the Davao Region.'),
(185, 74, NULL, NULL, 'Its capital is Tagum City.'),
(186, 75, NULL, NULL, 'A province in the Philippines located in the BARMM.'),
(187, 75, NULL, NULL, 'Its capital is Isabela City.'),
(188, 76, NULL, NULL, 'A province in the Philippines located in the BARMM.'),
(189, 76, NULL, NULL, 'Its capital is Jolo.'),
(190, 77, NULL, NULL, 'A province in the Philippines located in the BARMM.'),
(191, 77, NULL, NULL, 'Its capital is the municipality of Buluan.'),
(192, 78, NULL, NULL, 'A province in the Philippines located in the BARMM.'),
(193, 78, NULL, NULL, 'Its capital is the municipality of Datu Odin Sinsuat.'),
(194, 79, NULL, NULL, 'A province in the Philippines located in the BARMM.'),
(195, 79, NULL, NULL, 'Its capital is Marawi City.'),
(196, 80, NULL, NULL, 'A province in the Philippines located in the BARMM.'),
(197, 80, NULL, NULL, 'Its capital is the Municipality of Bongao.'),
(198, 81, NULL, NULL, 'A province in the Philippines located in the Zamboanga Peninsula region.'),
(199, 81, NULL, NULL, 'Its capital is Dipolog City.'),
(200, 82, NULL, NULL, 'A province in the Philippines located in the Zamboanga Peninsula region.'),
(201, 82, NULL, NULL, 'Its capital is Pagadian City.'),
(202, 83, NULL, NULL, 'A province in the Philippines located in the Zamboanga Peninsula region.'),
(203, 83, NULL, NULL, 'Its capital is Ipil.'),
(204, NULL, NULL, 4, 'The Philippines, formally known as the Republic of the Philippines, also called the Pearl of the Orient Seas, is a country located in Southeast Asia.'),
(205, NULL, NULL, 4, 'It is composed of the three main islands, namely Luzon, Visayas, Mindanao.');

-- --------------------------------------------------------

--
-- Table structure for table `islands`
--

CREATE TABLE `islands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islands`
--

INSERT INTO `islands` (`id`, `name`) VALUES
(1, 'Luzon'),
(2, 'Visayas'),
(3, 'Mindanao'),
(4, 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `region_id` char(5) DEFAULT NULL,
  `island_id` int(11) DEFAULT NULL,
  `picture_url` varchar(255) DEFAULT NULL,
  `info` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `population`
--

CREATE TABLE `population` (
  `id` int(11) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `region_id` char(5) DEFAULT NULL,
  `island_id` int(11) DEFAULT NULL,
  `population_count` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `population`
--

INSERT INTO `population` (`id`, `province_id`, `region_id`, `island_id`, `population_count`) VALUES
(1, NULL, NULL, 4, 'Philippines has the population of 109033245 and is 100% of the total population as of 2020'),
(2, 37, NULL, NULL, 'Abra has the population of 250,985 and is 0.23% of the total population as of 2020'),
(3, 67, NULL, NULL, 'Agusan del Norte has the population of 760,413 and is 0.7% of the total population as of 2020'),
(4, 66, NULL, NULL, 'Agusan del Sur has the population of 739,367 and is 0.68% of the total population as of 2020'),
(5, 41, NULL, NULL, 'Aklan has the population of 615,475 and is 0.56% of the total population as of 2020'),
(6, 28, NULL, NULL, 'Albay has the population of 1,374,768 and is 1.26% of the total population as of 2020'),
(7, 40, NULL, NULL, 'Antique has the population of 612,974 and is 0.56% of the total population as of 2020'),
(8, 36, NULL, NULL, 'Apayao has the population of 124,366 and is 0.11% of the total population as of 2020'),
(9, 10, NULL, NULL, 'Aurora has the population of 235,750 and is 0.22% of the total population as of 2020'),
(10, 75, NULL, NULL, 'Basilan has the population of 556,586 and is 0.51% of the total population as of 2020'),
(11, 14, NULL, NULL, 'Bataan has the population of 853,373 and is 0.78% of the total population as of 2020'),
(12, 9, NULL, NULL, 'Batanes has the population of 18,831 and is 0.02% of the total population as of 2020'),
(13, 20, NULL, NULL, 'Batangas has the population of 2,908,494 and is 2.67% of the total population as of 2020'),
(14, 38, NULL, NULL, 'Benguet has the population of 827,041 and is 0.76% of the total population as of 2020'),
(15, 50, NULL, NULL, 'Biliran has the population of 179,312 and is 0.16% of the total population as of 2020'),
(16, 48, NULL, NULL, 'Bohol has the population of 1,394,329 and is 1.28% of the total population as of 2020'),
(17, 64, NULL, NULL, 'Bukidnon has the population of 1,541,308 and is 1.41% of the total population as of 2020'),
(18, 13, NULL, NULL, 'Bulacan has the population of 3,708,890 and is 3.4% of the total population as of 2020'),
(19, 8, NULL, NULL, 'Cagayan has the population of 1,268,603 and is 1.16% of the total population as of 2020'),
(20, 29, NULL, NULL, 'Camarines Norte has the population of 629,699 and is 0.58% of the total population as of 2020'),
(21, 30, NULL, NULL, 'Camarines Sur has the population of 2,068,244 and is 1.9% of the total population as of 2020'),
(22, 61, NULL, NULL, 'Camiguin has the population of 92,808 and is 0.09% of the total population as of 2020'),
(23, 42, NULL, NULL, 'Capiz has the population of 804,952 and is 0.74% of the total population as of 2020'),
(24, 31, NULL, NULL, 'Catanduanes has the population of 271,879 and is 0.25% of the total population as of 2020'),
(25, 21, NULL, NULL, 'Cavite has the population of 4,344,829 and is 3.98% of the total population as of 2020'),
(26, 47, NULL, NULL, 'Cebu has the population of 5,151,274 and is 4.72% of the total population as of 2020'),
(27, 56, NULL, NULL, 'Cotabato has the population of 1,490,618 and is 1.37% of the total population as of 2020'),
(28, 73, NULL, NULL, 'Davao de Oro has the population of 767,547 and is 0.7% of the total population as of 2020'),
(29, 74, NULL, NULL, 'Davao del Norte has the population of 1,125,057 and is 1.03% of the total population as of 2020'),
(30, 71, NULL, NULL, 'Davao del Sur has the population of 2,457,430 and is 2.25% of the total population as of 2020'),
(31, 70, NULL, NULL, 'Davao Occidental has the population of 317,159 and is 0.29% of the total population as of 2020'),
(32, 72, NULL, NULL, 'Davao Oriental has the population of 576,343 and is 0.53% of the total population as of 2020'),
(33, 65, NULL, NULL, 'Dinagat Islands has the population of 128,117 and is 0.12% of the total population as of 2020'),
(34, 52, NULL, NULL, 'Eastern Samar has the population of 477,168 and is 0.44% of the total population as of 2020'),
(35, 43, NULL, NULL, 'Guimaras has the population of 187,842 and is 0.17% of the total population as of 2020'),
(36, 33, NULL, NULL, 'Ifugao has the population of 207,498 and is 0.19% of the total population as of 2020'),
(37, 1, NULL, NULL, 'Ilocos Norte has the population of 609,588 and is 0.56% of the total population as of 2020'),
(38, 2, NULL, NULL, 'Ilocos Sur has the population of 706,009 and is 0.65% of the total population as of 2020'),
(39, 44, NULL, NULL, 'Iloilo has the population of 2,509,525 and is 2.3% of the total population as of 2020'),
(40, 5, NULL, NULL, 'Isabela has the population of 1,697,050 and is 1.56% of the total population as of 2020'),
(41, 34, NULL, NULL, 'Kalinga has the population of 229,570 and is 0.21% of the total population as of 2020'),
(42, 3, NULL, NULL, 'La Union has the population of 822,352 and is 0.75% of the total population as of 2020'),
(43, 19, NULL, NULL, 'Laguna has the population of 3,382,193 and is 3.1% of the total population as of 2020'),
(44, 63, NULL, NULL, 'Lanao del Norte has the population of 1,086,017 and is 1% of the total population as of 2020'),
(45, 79, NULL, NULL, 'Lanao del Sur has the population of 1,195,518 and is 1.1% of the total population as of 2020'),
(46, 53, NULL, NULL, 'Leyte has the population of 2,028,728 and is 1.86% of the total population as of 2020'),
(47, 78, NULL, NULL, 'Maguindanao has the population of 1,667,258 and is 1.53% of the total population as of 2020'),
(48, 77, NULL, NULL, 'Maguindanao del Norte has the population of 1,667,258 and is 1.53% of the total population as of 2020'),
(49, 25, NULL, NULL, 'Marinduque del Sur has the population of 239,207 and is 0.22% of the total population as of 2020'),
(50, 32, NULL, NULL, 'Masbate has the population of 908,920 and is 0.83% of the total population as of 2020'),
(51, 39, NULL, NULL, 'Metro Manila has the population of 13,484,462 and is 12.37% of the total population as of 2020'),
(52, 60, NULL, NULL, 'Misamis Occidental has the population of 617,333 and is 0.57% of the total population as of 2020'),
(53, 62, NULL, NULL, 'Misamis Oriental has the population of 1,685,302 and is 1.55% of the total population as of 2020'),
(54, 35, NULL, NULL, 'Mountain Province has the population of 158,200 and is 0.15% of the total population as of 2020'),
(55, 45, NULL, NULL, 'Negros Occidental has the population of 3,223,955 and is 2.96% of the total population as of 2020'),
(56, 46, NULL, NULL, 'Negros Oriental has the population of 1,432,990 and is 1.31% of the total population as of 2020'),
(57, 55, NULL, NULL, 'Northern Samar has the population of 639,186 and is 0.59% of the total population as of 2020'),
(58, 11, NULL, NULL, 'Nueva Ecija has the population of 2,310,134 and is 2.12% of the total population as of 2020'),
(59, 7, NULL, NULL, 'Nueva Vizcaya has the population of 497,432 and is 0.46% of the total population as of 2020'),
(60, 24, NULL, NULL, 'Occidental Mindoro has the population of 525,354 and is 0.48% of the total population as of 2020'),
(61, 23, NULL, NULL, 'Oriental Mindoro has the population of 908,339 and is 0.83% of the total population as of 2020'),
(62, 26, NULL, NULL, 'Palawan has the population of 1,246,673 and is 1.14% of the total population as of 2020'),
(63, 16, NULL, NULL, 'Pampanga has the population of 2,900,637 and is 2.66% of the total population as of 2020'),
(64, 4, NULL, NULL, 'Pangasinan has the population of 3,163,190 and is 2.9% of the total population as of 2020'),
(65, 18, NULL, NULL, 'Quezon has the population of 2,229,383 and is 2.04% of the total population as of 2020'),
(66, 6, NULL, NULL, 'Quirino has the population of 203,828 and is 0.19% of the total population as of 2020'),
(67, 17, NULL, NULL, 'Rizal has the population of 3,330,143 and is 3.05% of the total population as of 2020'),
(68, 22, NULL, NULL, 'Romblon has the population of 308,985 and is 0.28% of the total population as of 2020'),
(69, 51, NULL, NULL, 'Samar has the population of 793,183 and is 0.73% of the total population as of 2020'),
(70, 59, NULL, NULL, 'Sarangani has the population of 558,946 and is 0.51% of the total population as of 2020'),
(71, 49, NULL, NULL, 'Siquijor has the population of 103,395 and is 0.09% of the total population as of 2020'),
(72, 27, NULL, NULL, 'Sorsogon has the population of 828,655 and is 0.76% of the total population as of 2020'),
(73, 58, NULL, NULL, 'South Cotabato has the population of 1,672,791 and is 1.53% of the total population as of 2020'),
(74, 54, NULL, NULL, 'Southern Leyte has the population of 429,573 and is 0.39% of the total population as of 2020'),
(75, 57, NULL, NULL, 'Sultan Kudarat has the population of 854,052 and is 0.78% of the total population as of 2020'),
(76, 76, NULL, NULL, 'Sulu has the population of 1,000,108 and is 0.92% of the total population as of 2020'),
(77, 68, NULL, NULL, 'Surigao del Norte has the population of 534,636 and is 0.49% of the total population as of 2020'),
(78, 69, NULL, NULL, 'Surigao del Sur has the population of 642,255 and is 0.59% of the total population as of 2020'),
(79, 12, NULL, NULL, 'Tarlac has the population of 1,503,456 and is 1.38% of the total population as of 2020'),
(80, 80, NULL, NULL, 'Tawi tawi has the population of 440,276 and is 0.4% of the total population as of 2020'),
(81, 15, NULL, NULL, 'Zambales has the population of 909,932 and is 0.83% of the total population as of 2020'),
(82, 81, NULL, NULL, 'Zamboanga del Norte has the population of 1,047,455 and is 0.96% of the total population as of 2020'),
(83, 82, NULL, NULL, 'Zamboanga del Sur has the population of 2,027,902 and is 1.86% of the total population as of 2020'),
(84, 83, NULL, NULL, 'Zamboanga Sibugay has the population of 669,840 and is 0.61% of the total population as of 2020'),
(85, NULL, '1', NULL, 'Region I Ilocos Region has the population of 5,301,139 and is 4.86% of the total population as of 2020'),
(86, NULL, '10', NULL, 'Region X Northern Mindanao has the population of 7,995,792 and is 7.33% of the total population as of 2020'),
(87, NULL, '11', NULL, 'Region XI Davao Region has the population of 8,195,053 and is 7.52% of the total population as of 2020'),
(88, NULL, '12', NULL, 'Region XII SOCCSKSARGEN has the population of 5,505,644 and is 5.05% of the total population as of 2020'),
(89, NULL, '13', NULL, 'Region XIII Caraga has the population of 2,791,136 and is 2.56% of the total population as of 2020'),
(90, NULL, '2', NULL, 'Region II Cagayan Valley has the population of 3,404,402 and is 3.12% of the total population as of 2020'),
(91, NULL, '3', NULL, 'Region III Central Luzon has the population of 17,382,928 and is 15.95% of the total population as of 2020'),
(92, NULL, '4A', NULL, 'Region IV A CALABARZON has the population of 16,135,544 and is 14.79% of the total population as of 2020'),
(93, NULL, '4B', NULL, 'Region IV B MIMAROPA Region has the population of 3,114,725 and is 2.86% of the total population as of 2020'),
(94, NULL, '5', NULL, 'Region V Bicol Region has the population of 5,711,653 and is 5.24% of the total population as of 2020'),
(95, NULL, '6', NULL, 'Region VI Western Visayas has the population of 9,012,639 and is 8.27% of the total population as of 2020'),
(96, NULL, '7', NULL, 'Region VII Central Visayas has the population of 7,914,156 and is 7.26% of the total population as of 2020'),
(97, NULL, '8', NULL, 'Region VIII Eastern Visayas has the population of 6,654,364 and is 6.1% of the total population as of 2020'),
(98, NULL, '9', NULL, 'Region IX Zamboanga Peninsula has the population of 4,696,851 and is 4.31% of the total population as of 2020'),
(99, NULL, 'BARMM', NULL, 'BARMM Bangsamoro Autonomous Region in Muslim Mindanao has the population of 4,954,734 and is 4.54% of the total population as of 2020'),
(100, NULL, 'CAR', NULL, 'CAR Cordillera Administrative Region has the population of 1,843,580 and is 1.69% of the total population as of 2020'),
(101, NULL, 'NCR', NULL, 'NCR National Capital Region has the population of 13,484,462 and is 12.37% of the total population as of 2020'),
(102, NULL, NULL, 1, 'Luzon has the population of 5,948,957 and is 5.46% of the total population as of 2020'),
(103, NULL, NULL, 2, 'Visayas has the population of 25,219,595 and is 23.13% of the total population as of 2020'),
(104, NULL, NULL, 3, 'Mindanao has the population of 31,794,263 and is 29.19% of the total population as of 2020');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `region_id` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `region_id`) VALUES
(1, 'Ilocos Norte', '1'),
(2, 'Ilocos Sur', '1'),
(3, 'La Union', '1'),
(4, 'Pangasinan', '1'),
(5, 'Isabela', '2'),
(6, 'Quirino', '2'),
(7, 'Nueva Vizcaya', '2'),
(8, 'Cagayan', '2'),
(9, 'Batanes', '2'),
(10, 'Aurora', '3'),
(11, 'Nueva Ecija', '3'),
(12, 'Tarlac', '3'),
(13, 'Bulacan', '3'),
(14, 'Bataan', '3'),
(15, 'Zambales', '3'),
(16, 'Pampanga', '3'),
(17, 'Rizal', '4A'),
(18, 'Quezon', '4A'),
(19, 'Laguna', '4A'),
(20, 'Batangas', '4A'),
(21, 'Cavite', '4A'),
(22, 'Romblon', '4B'),
(23, 'Oriental Mindoro', '4B'),
(24, 'Occidental Mindoro', '4B'),
(25, 'Marinduque', '4B'),
(26, 'Palawan', '4B'),
(27, 'Sorsogon', '5'),
(28, 'Albay', '5'),
(29, 'Camarines Norte', '5'),
(30, 'Camarines Sur', '5'),
(31, 'Catanduanes', '5'),
(32, 'Masbate', '5'),
(33, 'Ifugao', 'CAR'),
(34, 'Kalinga', 'CAR'),
(35, 'Mountain Province', 'CAR'),
(36, 'Apayao', 'CAR'),
(37, 'Abra', 'CAR'),
(38, 'Benguet', 'CAR'),
(39, 'Metro-Manila', 'NCR'),
(40, 'Antique', '6'),
(41, 'Aklan', '6'),
(42, 'Capiz', '6'),
(43, 'Guimaras', '6'),
(44, 'Iloilo', '6'),
(45, 'Negros Occidental', '6'),
(46, 'Negros Oriental', '7'),
(47, 'Cebu', '7'),
(48, 'Bohol', '7'),
(49, 'Siquijor', '7'),
(50, 'Biliran', '8'),
(51, 'Samar', '8'),
(52, 'Eastern-Samar', '8'),
(53, 'Leyte', '8'),
(54, 'Southern Leyte', '8'),
(55, 'Northern Samar', '8'),
(56, 'Cotabato', '12'),
(57, 'Sultan-Kudarat', '12'),
(58, 'South Cotabato', '12'),
(59, 'Sarangani', '12'),
(60, 'Misamis Occidental', '10'),
(61, 'Camiguin', '10'),
(62, 'Misamis Oriental', '10'),
(63, 'Lanao del Norte', '10'),
(64, 'Bukidnon', '10'),
(65, 'Dinagat Islands', '13'),
(66, 'Agusan del Sur', '13'),
(67, 'Agusan del Norte', '13'),
(68, 'Surigao del Norte', '13'),
(69, 'Surigao del Sur', '13'),
(70, 'Davao Occidental', '11'),
(71, 'Davao del Sur', '11'),
(72, 'Davao Oriental', '11'),
(73, 'Davao de Oro', '11'),
(74, 'Davao del Norte', '11'),
(75, 'Basilan', 'BARMM'),
(76, 'Sulu', 'BARMM'),
(77, 'Maguindanao del Sur', 'BARMM'),
(78, 'Maguindanao del Norte', 'BARMM'),
(79, 'Lanao del Sur', 'BARMM'),
(80, 'Tawi-Tawi', 'BARMM'),
(81, 'Zamboanga del Norte', '9'),
(82, 'Zamboanga del Sur', '9'),
(83, 'Zamboanga Sibugay', '9');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` char(5) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `island_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `island_id`) VALUES
('1', 'Region I Ilocos Region', 1),
('10', 'Region X Northern Mindanao', 3),
('11', 'Region XI Davao Region', 3),
('12', 'Region XII SOCCSKSARGEN', 3),
('13', 'Region XIII Caraga', 3),
('2', 'Region II Cagayan Valley', 1),
('3', 'Region III Central Luzon', 1),
('4A', 'Region IV A CALABARZON', 1),
('4B', 'Region IV B MIMAROPA Region', 1),
('5', 'Region V Bicol Region', 1),
('6', 'Region VI Western Visayas', 2),
('7', 'Region VII Central Visayas', 2),
('8', 'Region VIII Eastern Visayas', 2),
('9', 'Region IX Zamboanga Peninsula', 3),
('BARMM', 'BARMM Bangsamoro Autonomous Region in Muslim Mindanao', 3),
('CAR', 'CAR Cordillera Administrative Region', 1),
('NCR', 'NCR National Capital Region', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trivia`
--

CREATE TABLE `trivia` (
  `id` int(11) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `region_id` char(5) DEFAULT NULL,
  `island_id` int(11) DEFAULT NULL,
  `trivia_info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trivia`
--

INSERT INTO `trivia` (`id`, `province_id`, `region_id`, `island_id`, `trivia_info`) VALUES
(1, NULL, NULL, 1, 'The island was originally inhabited by Negritos before Austronesians from Taiwan took over.'),
(2, NULL, NULL, 1, 'Luzon is the largest among the three main islands.'),
(3, NULL, NULL, 1, 'The capital of the country, (Manila) is located in Luzon.'),
(4, NULL, NULL, 2, 'It is the smallest island among the three main islands of the country.'),
(5, NULL, NULL, 2, 'It only covers 16 main provinces and 3 regions.'),
(6, NULL, NULL, 3, 'It is the second largest island next to Luzon being the largest.'),
(7, NULL, NULL, 3, 'It covers 27 provinces and 6 regions.'),
(8, NULL, 'BARMM', NULL, 'On December 15, 2020, the number of cities in BARMM increased to three (3) after Cotabato City was officially transferred to the jurisdiction of the region following the 2019 Bangsamoro autonomy plebiscite.'),
(9, NULL, 'CAR', NULL, 'It is the country\'s only land-locked region.'),
(10, NULL, 'CAR', NULL, 'It has a mountainous topography and dubbed as the Watershed Cradle of North Luzon as it hosts nine major rivers that provide continuous water for irrigation and energy for Northern Luzon.'),
(11, NULL, 'NCR', NULL, 'The smallest region in the Philippines, it is the most densely populated region which is home to over 13 million Filipinos.'),
(12, NULL, NULL, NULL, 'Ilocos Norte is known for its windmills in Bangui, generating renewable energy and providing a picturesque view along the coastline.'),
(13, 1, NULL, NULL, 'The Paoay Church, also known as the St. Augustine Church in Paoay, is a UNESCO World Heritage Site and a national treasure of the Philippines.'),
(14, 1, NULL, NULL, 'Marcos Museum and Mausoleum in Batac pays tribute to the late President Ferdinand Marcos, who was born in Ilocos Norte.'),
(15, 2, NULL, NULL, 'Vigan City, the capital of Ilocos Sur, is a UNESCO World Heritage Site known for its well-preserved Spanish colonial houses and cobblestone streets.'),
(16, 2, NULL, NULL, 'Calle Crisologo in Vigan is a popular tourist destination, offering a glimpse of the Philippines\' colonial past.'),
(17, 3, NULL, NULL, 'La Union is known for its surfing spots in San Juan, attracting surfers from different parts of the country.'),
(18, 3, NULL, NULL, 'The Pindangan Ruins in San Fernando City are the remains of an old church and convent destroyed by an earthquake in 1892.'),
(19, 4, NULL, NULL, 'Pangasinan is known for the Hundred Islands National Park, a group of islands and islets with scenic views and marine life.'),
(20, 4, NULL, NULL, 'The Bangus (Milkfish) Festival in Dagupan City celebrates the city\'s status as the Bangus Capital of the Philippines.'),
(21, 4, NULL, NULL, 'The Lingayen Gulf is a historic site where General Douglas MacArthur landed during World War II.'),
(22, 5, NULL, NULL, 'Isabela is the second-largest province in the Philippines in terms of land area.'),
(23, 5, NULL, NULL, 'Magat Dam, located in the province, is one of the largest dams in Southeast Asia and serves as an irrigation and hydroelectric power source.'),
(24, 6, NULL, NULL, 'Quirino is known for its Aglipay Caves, a system of caves and underground rivers.'),
(25, 6, NULL, NULL, 'The province is named after Elpidio Quirino, the sixth President of the Philippines.'),
(26, 7, NULL, NULL, 'Nueva Vizcaya is known for its Imugan Falls, a popular destination for nature lovers and hikers.'),
(27, 7, NULL, NULL, 'The province is home to indigenous communities, including the Ifugao and Gaddang tribes.'),
(28, 8, NULL, NULL, 'Cagayan is known for its Callao Cave in Penablanca, which houses seven chambers and a chapel.'),
(29, 8, NULL, NULL, 'The Palaui Island in Santa Ana is a marine sanctuary and a favorite destination for eco-tourism activities.'),
(30, 9, NULL, NULL, 'Batanes is the northernmost province of the Philippines and is closer to Taiwan than to Luzon.'),
(31, 9, NULL, NULL, 'The Ivatan language is spoken in Batanes, and the traditional stone houses called \"Ivatan houses\"\" are well-preserved cultural landmarks.\"\"\"'),
(32, 10, NULL, NULL, 'Aurora is known for its stunning coastline and is a popular destination for surfers.'),
(33, 10, NULL, NULL, 'The province was named after Aurora Quezon, the wife of President Manuel Quezon.'),
(34, 11, NULL, NULL, 'Nueva Ecija is known as the \"Rice Granary of the Philippines\"\"\"\" due to its vast rice fields.\"\"\"'),
(35, 11, NULL, NULL, 'The province is a major agricultural hub and contributes significantly to the country\'s rice production.'),
(36, 12, NULL, NULL, 'Tarlac is the hometown of former Philippine President Benigno Aquino III.'),
(37, 12, NULL, NULL, 'The province is known for the Luisita Golf and Country Club, an exclusive golf course.'),
(38, 13, NULL, NULL, 'Bulacan is known for the Barasoain Church, where the First Philippine Republic was established.'),
(39, 13, NULL, NULL, 'Malolos, the capital city, served as the seat of the Philippine government during the First Philippine Republic.'),
(40, 14, NULL, NULL, 'Bataan is known for the Bataan Death March, a significant event during World War II.'),
(41, 14, NULL, NULL, 'The province is home to Mount Samat, a historical site and national shrine.'),
(42, 15, NULL, NULL, 'Zambales is known for its stunning beaches and coves, including Anawangin Cove and Potipot Island.'),
(43, 15, NULL, NULL, 'The province was severely affected by the eruption of Mount Pinatubo in 1991.'),
(44, 15, NULL, NULL, 'Olongapo City, while administratively independent from the province, is geographically surrounded by Zambales.'),
(45, 16, NULL, NULL, 'Pampanga is known for its culinary delights, including the famous sisig and tamales.'),
(46, 16, NULL, NULL, 'The province is home to the annual Giant Lantern Festival, showcasing massive and colorful lanterns.'),
(47, 17, NULL, NULL, 'Rizal is known for Hinulugang Taktak, a waterfall and national park in Antipolo.'),
(48, 17, NULL, NULL, 'The province is named after Jose Rizal, a national hero of the Philippines'),
(49, 18, NULL, NULL, 'Quezon is home to the Maubanog Festival, a celebration showcasing the province\'s cultural heritage.'),
(50, 18, NULL, NULL, 'The province is known for the Villa Escudero Plantations and Resort in Tiaong.'),
(51, 19, NULL, NULL, 'Laguna is home to Pagsanjan Falls, a popular tourist destination known for its picturesque natural scenery.'),
(52, 19, NULL, NULL, 'The province is a hub for the manufacturing and industrial sectors.'),
(53, 20, NULL, NULL, 'Batangas is known for its beaches and diving spots in places like Anilao.'),
(54, 20, NULL, NULL, 'The province is a significant producer of agricultural products, including coffee and coconut.'),
(55, 21, NULL, NULL, 'Cavite is known for historical sites like Aguinaldo Shrine, where the Philippine Declaration of Independence took place in 1898.'),
(56, 21, NULL, NULL, 'The province is a major industrial and commercial center, with economic zones and industrial parks.'),
(57, 22, NULL, NULL, 'Romblon is known for its marble industry, producing high-quality marble products.'),
(58, 22, NULL, NULL, 'The province is a popular destination for beach enthusiasts, with pristine white sand beaches.'),
(59, 23, NULL, NULL, 'Oriental Mindoro is known for the Puerto Galera Bay, a UNESCO Man and the Biosphere Reserve.'),
(60, 23, NULL, NULL, 'The province is a major producer of rice, coconut, and other agricultural products.'),
(61, 24, NULL, NULL, 'Occidental Mindoro is known for the Apo Reef Natural Park, a UNESCO World Heritage Site.'),
(62, 24, NULL, NULL, 'The province is a major producer of high-quality calamansi (Philippine lime).'),
(63, 25, NULL, NULL, 'Marinduque is known for the Moriones Festival, a unique and colorful Lenten celebration.'),
(64, 25, NULL, NULL, 'The province is considered the geographical center of the Philippine archipelago.'),
(65, 26, NULL, NULL, 'Palawan is known for the Puerto Princesa Underground River, a UNESCO World Heritage Site.'),
(66, 26, NULL, NULL, 'The province is home to Tubbataha Reefs Natural Park, a UNESCO World Heritage Site.'),
(67, 26, NULL, NULL, 'Palawan is consistently ranked as one of the best islands in the world by various travel publications.'),
(68, 27, NULL, NULL, 'Sorsogon\'s name comes from the Bicol word \"Solsogon\"'),
(69, 27, NULL, NULL, 'It is known as the \'Land of Kasanggayahan\' or \'A Life of Prosperity.\''),
(70, 28, NULL, NULL, 'Albay is known as the Vatican of Disasters of the Philippines due to various natural phenomena such as typhoons, landslides, volcanic eruptions, and tsuna'),
(71, 28, NULL, NULL, 'Albay Bikol, or simply Albayanon, is a group of languages and one of the three languages that compose Inland Bikol.'),
(72, 28, NULL, NULL, 'The Magayon Festival is a vibrant annual event in Albay that celebrates the rich cultural heritage and picturesque beauty of the province.'),
(73, 29, NULL, NULL, 'Camarines Norte is known for its dense rainforest, which is a habitat for a variety of wildlife.'),
(74, 29, NULL, NULL, 'It is an agricultural province producing coconut, rice, pili nuts, and pineapples.'),
(75, 30, NULL, NULL, 'Camarines Sur is often referred to as CamSur and is the largest of the six provinces in the Bicol Peninsula.'),
(76, 30, NULL, NULL, 'Rinconada Bikol is the language used in the province.'),
(77, 31, NULL, NULL, 'Catanduanes is known as the \"Land of the Howling Winds\"\"\"\" due to its exposure to the Pacific Ocean.\"\"\"'),
(78, 31, NULL, NULL, 'The island is the first landmass of the Philippine archipelago to face the Pacific Ocean.'),
(79, 32, NULL, NULL, 'Masbate used to be a part of Sorsogon.'),
(80, 32, NULL, NULL, 'The Rodeo Masbateno, showcasing the province\'s cowboy culture, is one of its famous festivals'),
(81, 33, NULL, NULL, 'Ifugao is recognized for its UNESCO World Heritage-listed Banaue Rice Terraces, often referred to as the \"Eighth Wonder of the World.\"\"\"'),
(82, 34, NULL, NULL, 'Kalinga is known for its rich cultural heritage, particularly its traditional dances and rituals.'),
(83, 35, NULL, NULL, 'Sagada, a town in Mountain Province, is known for its picturesque landscapes, hanging coffins, and unique burial practices.'),
(84, 36, NULL, NULL, 'Apayao is known for its lush forests and diverse ecosystems.'),
(85, 37, NULL, NULL, 'Abra is known for its traditional festivities like the Abrenian Kawayan Festival, which showcases the bamboo as a versatile material in their culture.'),
(86, 38, NULL, NULL, 'Benguet is known for its extensive vegetable farms, earning it the title \"Salad Bowl of the Philippines.\"\"\"'),
(87, 38, NULL, NULL, 'The annual Panagbenga Festival in Baguio City, which is part of Benguet, is a grand flower festival celebrated with vibrant street parades and floral floats.'),
(88, 39, NULL, NULL, 'Manila is one of the most densely populated cities in the world.'),
(89, 39, NULL, NULL, 'Manila has a rich and diverse history.'),
(90, 40, NULL, NULL, 'Antique is known for its unique Binirayan Festival, which reenacts the landing of the ten Bornean datus in Malandog, Hamtic.'),
(91, 40, NULL, NULL, 'The province boasts natural attractions such as the Malumpati Cold Spring and the Seco Island.'),
(92, 41, NULL, NULL, 'Aklan is known for the Ati-Atihan Festival, a lively and colorful celebration held in Kalibo every January.'),
(93, 41, NULL, NULL, 'Boracay Island, one of the most famous tourist destinations in the Philippines, is part of Aklan.'),
(94, 42, NULL, NULL, 'Capiz is known as the \"Seafood Capital of the Philippines\"'),
(95, 42, NULL, NULL, 'The province is home to the \"Aswang Festival\"'),
(96, 43, NULL, NULL, 'Guimaras is renowned for producing some of the sweetest mangoes in the world, earning it the title \"Mango Capital of the Philippines.\"\"\"\"\"\"\"'),
(97, 43, NULL, NULL, 'The island province is accessible by pumpboat from Iloilo City and is known for its pristine beaches.'),
(98, 44, NULL, NULL, 'Iloilo is known for the Dinagyang Festival, a world-renowned cultural and religious celebration held in Iloilo City every January.'),
(99, 44, NULL, NULL, 'Miagao Church, a UNESCO World Heritage Site, is located in Iloilo and is known for its unique architecture.'),
(100, 45, NULL, NULL, 'Negros Occidental is known for the MassKara Festival, a colorful and lively celebration held in Bacolod City every October.'),
(101, 45, NULL, NULL, 'The province is a major sugar producer in the Philippines, earning it the title \"Sugarbowl of the Philippines.\"\"\"\"\"\"\"'),
(102, 46, NULL, NULL, 'Negros Oriental is known for its unique sandbar, Manjuyod Sandbar, often referred to as the \"Maldives of the Philippines.\"\"\"\"\"\"\"'),
(103, 46, NULL, NULL, 'Dumaguete City, the capital of Negros Oriental, is nicknamed the \"City of Gentle People.\"\"\"\"\"\"\"'),
(104, 47, NULL, NULL, 'Cebu is known for the Sinulog Festival, one of the grandest and most colorful festivals in the Philippines, celebrated in honor of the Santo Nino'),
(105, 47, NULL, NULL, 'Magellan\'s Cross, planted by Ferdinand Magellan upon his arrival in Cebu in 1521, is a significant historical and religious landmark in the province.'),
(106, 48, NULL, NULL, 'Bohol is famous for its Chocolate Hills, a natural geological formation of over a thousand conical hills that turn brown during the dry season, resembling chocolate kisses.'),
(107, 48, NULL, NULL, 'The province is known for its tarsiers, one of the world\'s smallest primates.'),
(108, 49, NULL, NULL, 'Siquijor is known for its mystical reputation and is often associated with traditional folk healing practices.'),
(109, 49, NULL, NULL, 'The island is surrounded by coral reefs, making it a popular destination for snorkeling and diving.'),
(110, 50, NULL, NULL, 'Biliran is known for its scenic spots, including the Tinago Falls, Ulan-Ulan Falls, and Higatangan Island.'),
(111, 50, NULL, NULL, 'The island province is accessible via a bridge from Leyte.'),
(112, 51, NULL, NULL, 'Samar is known for its rich biodiversity, and the Ulot River is a popular ecotourism destination.'),
(113, 51, NULL, NULL, 'Lulugayan Falls, located in Calbiga, is one of the stunning waterfalls in the province.'),
(114, 52, NULL, NULL, 'Eastern Samar is known for the pristine beaches of Guiuan, which include Calicoan Island.'),
(115, 52, NULL, NULL, 'Homonhon Island, where Ferdinand Magellan first made landfall in the Philippines, is part of Eastern Samar.'),
(116, 53, NULL, NULL, 'Leyte is historically significant as the site of the Battle of Leyte Gulf during World War II, one of the largest naval battles in history.'),
(117, 53, NULL, NULL, 'The San Juanico Bridge, connecting Leyte and Samar, is the longest bridge in the Philippines.'),
(118, 54, NULL, NULL, 'Southern Leyte is known for its dive spots, including Sogod Bay, which is famous for whale shark sightings.'),
(119, 54, NULL, NULL, 'The province is part of the larger Leyte-Samar Palea Arc, known for its geological features and biodiversity.'),
(120, 55, NULL, NULL, 'Northern Samar is known for the scenic Biri Rock Formation, a collection of wave-shaped rock formations along the coast.'),
(121, 55, NULL, NULL, 'The province is part of the historical \"Bahandi sa Northern Samar\"'),
(122, 56, NULL, NULL, 'Cotabato is known for its vast agricultural lands, contributing significantly to Mindanao\'s food production.'),
(123, 56, NULL, NULL, 'Lake Venado, one of the highest lakes in the Philippines, is located in the province, near the summit of Mount Apo.'),
(124, 57, NULL, NULL, 'Sultan Kudarat, formerly known as Nuling, is a coastal municipality in the province of Maguindanao.'),
(125, 58, NULL, NULL, 'South Cotabato is known for its scenic landscapes, including the picturesque Lake Sebu and Seven Falls.'),
(126, 58, NULL, NULL, 'The T\'boli people, an indigenous group, inhabit the province and are known for their vibrant culture and crafts.'),
(127, 59, NULL, NULL, 'Sarangani is known for its beautiful beaches and diving spots along Sarangani Bay.'),
(128, 59, NULL, NULL, 'The province is named after Sarangani Bay, which was named by Spanish colonizers.'),
(129, 60, NULL, NULL, 'Ozamiz City is known for the Cotta Fort and Immaculate Conception Cathedral, historical landmarks from the Spanish era.'),
(130, 60, NULL, NULL, 'Misamis Occidental is recognized for the Subanen Tribe, an indigenous group with rich cultural heritage.'),
(131, 61, NULL, NULL, 'Camiguin is known as the \"Island Born of Fire\"\"\"\" due to its volcanic origins.\"\"\"'),
(132, 61, NULL, NULL, 'The island is famous for the Sunken Cemetery, a historical site submerged underwater.'),
(133, 62, NULL, NULL, 'Cagayan de Oro City is known as the \"City of Golden Friendship\"\"\"\" and is a major commercial and educational hub in Mindanao.\"\"\"'),
(134, 62, NULL, NULL, 'Misamis Oriental is home to Mapawa Nature Park, a popular eco-tourism destination with various outdoor activities.'),
(135, 63, NULL, NULL, 'Iligan City is known as the \"City of Majestic Waterfalls\"\"\"\" due to its numerous waterfalls\"'),
(136, 63, NULL, NULL, 'Lanao del Norte is home to the Ma. Cristina Ancestral House, a Spanish-era house turned museum.'),
(137, 64, NULL, NULL, 'Bukidnon is known as the \"Food Basket of Mindanao\"\"\"\" due to its vast agricultural production.\"\"\"'),
(138, 64, NULL, NULL, 'The province is home to the Kaamulan Festival, an ethnic cultural festival celebrated by various indigenous groups in Bukidnon.'),
(139, 65, NULL, NULL, 'Dinagat Islands was once part of the province of Surigao del Norte before becoming a separate province in 2006.'),
(140, 65, NULL, NULL, 'The province is known for its scenic landscapes and pristine beaches.'),
(141, 66, NULL, NULL, 'Agusan del Sur is home to the Mount Magdiwata, a mountainous area known for its rich biodiversity.'),
(142, 66, NULL, NULL, 'The province is part of the Agusan Marsh, the country\'s largest marshland.'),
(143, 67, NULL, NULL, 'Agusan del Norte is known for its diverse ecosystems, including the Agusan Marsh Wildlife Sanctuary.'),
(144, 67, NULL, NULL, 'Mount Hilong-Hilong, one of the highest peaks in the province, is a key biodiversity area.'),
(145, 68, NULL, NULL, 'Surigao del Norte is known for its enchanting islands and clear waters, making it a popular destination for beach lovers.'),
(146, 68, NULL, NULL, 'The province is a gateway to the Siargao Island, a world-renowned surfing destination.'),
(147, 69, NULL, NULL, 'Surigao del Sur is known for the Tinuy-an Falls, often referred to as the \"Niagara Falls of the Philippines.\"\"\"'),
(148, 69, NULL, NULL, 'The province is part of the Diwata Mountain Range, contributing to its diverse ecosystems.'),
(149, 70, NULL, NULL, 'Davao Occidental is the newest province in the Philippines, having been carved out from Davao del Sur in 2013.'),
(150, 70, NULL, NULL, 'The province is known for its pristine beaches and marine biodiversity.'),
(151, 71, NULL, NULL, 'Davao del Sur is known for Mount Apo, the highest peak in the Philippines, which is shared with Davao City and North Cotabato.'),
(152, 71, NULL, NULL, 'The province is a gateway to various adventure activities, including mountain climbing and hot spring resorts.'),
(153, 72, NULL, NULL, 'Davao Oriental is known for the Aliwagwag Falls, considered the country\'s highest waterfall.'),
(154, 72, NULL, NULL, 'The province is part of the Davao Region\'s eastern seaboard, offering scenic coastal views and diverse marine life.'),
(155, 73, NULL, NULL, 'The province of Davao de Oro was formerly known as Compostela Valley and was carved from the Davao del Norte province by virtue of Republic Act 8470 ratified on 8 March 1998.'),
(156, 73, NULL, NULL, 'It celebrates its founding anniversary every 8th of March.'),
(157, 74, NULL, NULL, 'Tagum City is known for the Muscovado Capital of the Philippines due to its extensive sugarcane plantations.'),
(158, 74, NULL, NULL, 'Davao del Norte is home to the Davao Penal Colony, a prison facility that promotes agricultural rehabilitation.'),
(159, 75, NULL, NULL, 'Basilan is known for its colorful Yakan weavings, showcasing the rich cultural heritage of the Yakan people.'),
(160, 75, NULL, NULL, 'Isabela City is the only chartered city in the province and serves as the center of commerce and trade.'),
(161, 76, NULL, NULL, 'Sulu is known for its vibrant traditional ceremonies and festivals, showcasing the rich cultural heritage of the Tausug people.'),
(162, 76, NULL, NULL, 'Jolo, the capital of Sulu, is considered the center of trade and commerce in the province.'),
(163, 77, NULL, NULL, 'Maguindanaon are known for their distinguished in the realm of visual art.'),
(164, 77, NULL, NULL, 'Historically, they have been renowned as metalworkers, producing the wavy-bladed keris ceremonial swords and other weapons, as well as gongs.'),
(165, 78, NULL, NULL, 'Maguindanao del Norte is a city in Bangsamoro, Philippines.'),
(166, 78, NULL, NULL, 'It has many popular attractions, including The Grand Mosque of Cotabato, City Plaza, Amaya Beach Resort, making it well worth a visit.'),
(167, 79, NULL, NULL, 'Lanao del Sur is known for the scenic Lake Lanao, the second-largest lake in the Philippines.'),
(168, 79, NULL, NULL, 'Marawi City, dubbed as the \"Islamic City of Marawi\"'),
(169, 80, NULL, NULL, 'Tawi-Tawi is known for its colorful traditional vinta boat races, a vibrant showcase of the seafaring culture of the Sama-Bajau people.'),
(170, 80, NULL, NULL, 'Bongao, the provincial capital, is an emerging economic and commercial hub in the region.'),
(171, 81, NULL, NULL, 'Dapitan City is known for being the place of exile of national hero Jose Rizal.'),
(172, 81, NULL, NULL, 'The province is home to the Rizal Shrine, a historical and cultural site in honor of Jose Rizal.'),
(173, 82, NULL, NULL, 'Pagadian City is dubbed the \"Little Hong Kong of the South\"\"\"\" due to its geographical features.\"\"\"'),
(174, 82, NULL, NULL, 'Zamboanga del Sur is known for its Dakak Park and Beach Resort, a popular tourist destination.'),
(175, 83, NULL, NULL, 'Zamboanga Sibugay is known for its diverse ethnic groups and indigenous cultures.'),
(176, 83, NULL, NULL, 'The province has several natural attractions, including waterfalls, caves, and beaches.'),
(177, NULL, NULL, NULL, 'Philippines has the 3rd Largest Catholic Population.'),
(178, NULL, NULL, 4, 'Philippines consist of 7,641 islands putting the Philippines in the second rank in Asia, after Indonesia.'),
(179, NULL, '1', NULL, 'Region 1 was first inhabited by the aboriginal Negretos, before they were pushed by successive waves Austronesian migrants that penetrated the narrow coast. (slideshare)'),
(180, NULL, '2', NULL, 'Region 2 is crisscrossed by the longest and largest river network, the Cagayan River, also known as Rio Grande de Cagayan. (cda.gov.ph)'),
(181, NULL, '3', NULL, 'Region 3 has the largest plain in the country and produces most of the country\'s rice supply. (kids.kiddle.co)'),
(182, NULL, '4A', NULL, 'Region 4A\'s Laguna is dubbed as the automotive capital or the Detroit City of the Philippines because most of the automative assemblers in the country Ford, Honda, Isuzu, Mitsubishi, Nissan, and Toyota are located here. (dti.gov.ph)'),
(183, NULL, '4B', NULL, 'MIMAROPA is one of the busiest regions in terms of tourism. (nia.gov.ph)'),
(184, NULL, '5', NULL, 'Region 5 was originally called Ibalong. (kidskonnect.com)'),
(185, NULL, '6', NULL, 'The province of Palawan was transferred to Region VI (Western Visayas) on May 23, 2005 by Executive Order 429. (coursehero,com)'),
(186, NULL, '7', NULL, 'Region 7 is the second smallest region in the country with a total land area of 14,951.5 square kilometers. (blgf.gov.ph)'),
(187, NULL, '8', NULL, 'Region 8 is one of the fish exporting regions of the country. There are substantial forest reserves in the interiors of the islands.(dti.gov.ph)'),
(188, NULL, '9', NULL, 'Region 9 has vast forest resources. Logs, lumber, veneer and plywood are once among its major export products. It is also richly endowed with mineral deposits both metallic and non-metallic. (dti.gov.ph)'),
(189, NULL, '10', NULL, 'Region 10 - Northern Mindanao is renowned for its serene environment and progress, thanks to its vast agricultural and industrial land.'),
(190, NULL, '10', NULL, ' Its strategic location for trade is further complemented by its abundance of natural wonders.(visitregion10.com)'),
(191, NULL, '11', NULL, 'Region 11 is famous for its forestland and fertile fields, the region is famous for its rich mineral resources, such as gold, copper, manganese and nickel.(nro.neda.gov.ph)'),
(192, NULL, '12', NULL, 'Region 12  is among the country\'s leading producers of palay and corn. It is the top producer of high value crops like coffee, banana, pineapple, and, oil palm. '),
(193, NULL, '12', NULL, 'It leads in livestock inventory and it is the tuna capital of the Philippines as it hosts 80 percent of the tuna industry in the country. (innovate.dti.gov.ph)'),
(194, NULL, '13', NULL, 'Region 13 is noted for its wood-based economy. It also has extensive water resources and rich mineral deposits such as iron, gold, silver, nickel, chromite, manganese and copper. (caraga.deped.gov.ph)\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `game_metrics`
--
ALTER TABLE `game_metrics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `island_id` (`island_id`),
  ADD KEY `game_metrics_ibfk_3` (`province_id`);

--
-- Indexes for table `geography`
--
ALTER TABLE `geography`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `island_id` (`island_id`);

--
-- Indexes for table `islands`
--
ALTER TABLE `islands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `island_id` (`island_id`);

--
-- Indexes for table `population`
--
ALTER TABLE `population`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `island_id` (`island_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `island_id` (`island_id`);

--
-- Indexes for table `trivia`
--
ALTER TABLE `trivia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `trivia_ibfk_2` (`region_id`),
  ADD KEY `trivia_ibfk_3` (`island_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `game_metrics`
--
ALTER TABLE `game_metrics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geography`
--
ALTER TABLE `geography`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=737;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `islands`
--
ALTER TABLE `islands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `population`
--
ALTER TABLE `population`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `trivia`
--
ALTER TABLE `trivia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Constraints for table `game_metrics`
--
ALTER TABLE `game_metrics`
  ADD CONSTRAINT `game_metrics_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `game_metrics_ibfk_2` FOREIGN KEY (`island_id`) REFERENCES `islands` (`id`),
  ADD CONSTRAINT `game_metrics_ibfk_3` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Constraints for table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`),
  ADD CONSTRAINT `information_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `information_ibfk_3` FOREIGN KEY (`island_id`) REFERENCES `islands` (`id`);

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`),
  ADD CONSTRAINT `pictures_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `pictures_ibfk_3` FOREIGN KEY (`island_id`) REFERENCES `islands` (`id`);

--
-- Constraints for table `population`
--
ALTER TABLE `population`
  ADD CONSTRAINT `population_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`),
  ADD CONSTRAINT `population_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `population_ibfk_3` FOREIGN KEY (`island_id`) REFERENCES `islands` (`id`);

--
-- Constraints for table `provinces`
--
ALTER TABLE `provinces`
  ADD CONSTRAINT `provinces_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_ibfk_1` FOREIGN KEY (`island_id`) REFERENCES `islands` (`id`);

--
-- Constraints for table `trivia`
--
ALTER TABLE `trivia`
  ADD CONSTRAINT `trivia_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`),
  ADD CONSTRAINT `trivia_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `trivia_ibfk_3` FOREIGN KEY (`island_id`) REFERENCES `islands` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
