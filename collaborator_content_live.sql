-- Collaborator CONTENT ONLY for LIVE (no schema changes)
-- Source DB: never-forget-live
-- Matches by exact title. Skips if overview already filled.
-- FAQs insert only when collaborator has 0 FAQ rows.
-- Safe to re-run.
SET NAMES utf8mb4;

-- Vital Choice
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'vital-choice', `slug`),
  `short_description` = 'Premium seafood and specialty gifts for elevated recognition.',
  `overview` = 'Vital Choice is recognized for premium seafood and specialty food gifts that support elevated corporate appreciation.

NEVER FORGET partners with Vital Choice to help organizations select refined gift options for executive recognition, client hospitality, and premium thank-you moments.',
  `services` = '["Premium seafood gift selections","Specialty gourmet gift packages","Executive appreciation gifts","Client hospitality gifting","Occasion-based gourmet recognition"]',
  `features` = '["Premium product positioning","Suitable for elevated gifting occasions","Distinctive gourmet appeal","Strong fit for executive audiences","Memorable gift experience"]',
  `benefits` = '["Impress discerning recipients","Differentiate your appreciation program","Support high-touch client relationships","Reinforce a premium brand image"]',
  `industries_served` = '["Executive leadership teams","Luxury and hospitality brands","Professional services","Corporate client relations","High-touch sales organizations"]',
  `why_choose` = 'Vital Choice is ideal when appreciation needs to feel distinctive and premium. NEVER FORGET helps ensure the right selection for your audience and occasion.'
WHERE `title` = 'Vital Choice'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Vital Choice?' AS `question`, 'NEVER FORGET partners with Vital Choice to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'Vital Choice'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- Wolferman's Bakery
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'wolfermans-bakery', `slug`),
  `short_description` = 'Bakery gift collections for classic gourmet appreciation.',
  `overview` = 'Wolferman\'s Bakery is known for gourmet bakery gifts that feel classic, comforting, and well-suited for professional appreciation.

Through NEVER FORGET, organizations can use Wolferman\'s selections to recognize employees and clients with high-quality bakery gifts for holidays, milestones, and thank-you moments.',
  `services` = '["Gourmet bakery gift collections","Breakfast and pastry gift sets","Holiday appreciation gifts","Client thank-you packages","Employee milestone recognition gifts"]',
  `features` = '["Premium bakery quality","Classic gourmet appeal","Attractive gift packaging","Suitable for professional gifting","Strong seasonal collections"]',
  `benefits` = '["Deliver a warm and refined gift experience","Support traditional corporate appreciation styles","Create comfort-driven recognition moments","Offer gifts that feel both personal and professional"]',
  `industries_served` = '["Corporate offices","Financial services","Insurance organizations","Professional associations","Client-facing sales teams"]',
  `why_choose` = 'Wolferman\'s Bakery is a dependable option for gourmet appreciation with a classic feel. NEVER FORGET helps integrate these gifts into your recognition strategy with ease.'
WHERE `title` = 'Wolferman\'s Bakery'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Wolferman\'s Bakery?' AS `question`, 'NEVER FORGET partners with Wolferman\'s Bakery to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'Wolferman\'s Bakery'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- 1-800 Baskets
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', '1-800-baskets', `slug`),
  `short_description` = 'Curated gift baskets for employees, clients, and special occasions.',
  `overview` = '1-800-Baskets offers curated gift baskets designed for celebration, gratitude, and corporate recognition.

Through NEVER FORGET, companies can select basket options that fit different budgets, occasions, and recipient preferences while keeping the experience polished and professional.',
  `services` = '["Gourmet and snack gift baskets","Occasion-themed gift collections","Employee appreciation baskets","Client thank-you gifts","Bulk and multi-recipient gifting support"]',
  `features` = '["Ready-to-gift curated assortments","Options for many occasions and tastes","Attractive presentation","Practical gifts recipients enjoy","Scalable for teams of any size"]',
  `benefits` = '["Save time with ready-made gift solutions","Offer variety without complicating ordering","Deliver a polished appreciation experience","Support both one-time and ongoing recognition"]',
  `industries_served` = '["Corporate HR and people teams","Sales and account management","Customer success teams","Event and conference planners","Small and mid-size businesses"]',
  `why_choose` = 'Gift baskets are a versatile way to show appreciation. NEVER FORGET helps match the right 1-800-Baskets options to your audience, occasion, and brand tone.'
WHERE `title` = '1-800 Baskets'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with 1-800-Baskets?' AS `question`, 'NEVER FORGET partners with 1-800-Baskets to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = '1-800 Baskets'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- Personalization Mall
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'personalization-mall', `slug`),
  `short_description` = 'Personalized gifts that make recognition feel one-of-a-kind.',
  `overview` = 'Personalization Mall specializes in customized gifts that help recognition feel personal and intentional.

NEVER FORGET works with Personalization Mall so organizations can deliver branded or personalized items that reflect both company culture and individual appreciation.',
  `services` = '["Personalized keepsake gifts","Custom-engraved recognition items","Branded appreciation products","Occasion-based personalized gifting","Employee milestone gifts"]',
  `features` = '["Customization options for many products","Strong personal touch","Useful for long-term keepsakes","Flexible for different budgets","Ideal for brand-aligned recognition"]',
  `benefits` = '["Make every recipient feel individually valued","Extend brand presence through customized gifts","Create lasting reminders of appreciation","Support unique recognition campaigns"]',
  `industries_served` = '["Corporate HR teams","Marketing and brand teams","Membership organizations","Education institutions","Retail and franchise groups"]',
  `why_choose` = 'Personalized gifts help appreciation feel intentional. NEVER FORGET helps you choose Personalization Mall options that fit your brand, budget, and recognition goals.'
WHERE `title` = 'Personalization Mall'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Personalization Mall?' AS `question`, 'NEVER FORGET partners with Personalization Mall to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'Personalization Mall'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- Simply Chocolate
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'simply-chocolate', `slug`),
  `short_description` = 'Artisan chocolate gifts for refined corporate appreciation.',
  `overview` = 'Simply Chocolate offers refined chocolate gifts that work well for professional recognition and client appreciation.

Through NEVER FORGET, businesses can choose chocolate selections that feel premium, thoughtful, and appropriate for workplace and client gifting.',
  `services` = '["Premium chocolate gift sets","Corporate thank-you gifts","Holiday and seasonal collections","Employee recognition gifts","Curated assortments for mixed audiences"]',
  `features` = '["Premium product quality","Elegant packaging options","Broad recipient appeal","Suitable for formal and casual recognition","Easy to include in gifting programs"]',
  `benefits` = '["Deliver a polished appreciation experience","Offer a universally enjoyed gift type","Support both individual and group recognition","Enhance brand goodwill with quality selections"]',
  `industries_served` = '["Corporate and professional offices","Legal and consulting firms","Technology companies","Marketing agencies","Customer success organizations"]',
  `why_choose` = 'Chocolate gifts remain a classic and elegant appreciation choice. NEVER FORGET helps pair Simply Chocolate options with your recognition goals and delivery needs.'
WHERE `title` = 'Simply Chocolate'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Simply Chocolate?' AS `question`, 'NEVER FORGET partners with Simply Chocolate to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'Simply Chocolate'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- Sharis Berries
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'sharis-berries', `slug`),
  `short_description` = 'Hand-dipped berries and dessert gifts for standout appreciation.',
  `overview` = 'Shari\'s Berries is known for hand-dipped berries and dessert gifts that make celebrations feel special.

NEVER FORGET works with Shari\'s Berries to help companies deliver eye-catching appreciation gifts for milestones, thank-you moments, and relationship-building occasions.',
  `services` = '["Hand-dipped berry gifts","Dessert gift arrangements","Celebration and thank-you gifts","Client and partner appreciation","Occasion-based delivery coordination"]',
  `features` = '["Visually impressive gift presentation","Premium dessert-style options","Great for memorable occasions","Suitable for personal and corporate gifting","Strong recipient appeal"]',
  `benefits` = '["Make appreciation moments feel memorable","Stand out from standard corporate gifts","Celebrate achievements with elegance","Strengthen personal connections with clients and teams"]',
  `industries_served` = '["Sales and business development","Executive offices","Event marketing teams","Hospitality brands","Professional services firms"]',
  `why_choose` = 'When you want a gift that feels festive and distinctive, Shari\'s Berries is an excellent option. NEVER FORGET helps ensure the right selection and timing for each occasion.'
WHERE `title` = 'Sharis Berries'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Shari\'s Berries?' AS `question`, 'NEVER FORGET partners with Shari\'s Berries to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'Sharis Berries'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- 1-800 Flowers
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', '1-800-flowers', `slug`),
  `short_description` = 'Floral and gift arrangements for timely appreciation moments.',
  `overview` = '1-800-Flowers is a leading floral and gifting partner for celebrations, milestones, and thoughtful recognition.

NEVER FORGET works with 1-800-Flowers to help businesses send beautiful arrangements and gift options that arrive on time and make recipients feel valued.',
  `services` = '["Fresh floral arrangements","Celebration and milestone gifts","Sympathy and care arrangements","Corporate recognition deliveries","Occasion-based gifting programs"]',
  `features` = '["Wide variety of floral styles","Reliable delivery options","Suitable for personal and professional occasions","Seasonal collections available","Easy coordination for multiple recipients"]',
  `benefits` = '["Express appreciation with a personal touch","Recognize moments quickly and thoughtfully","Strengthen relationships with clients and teams","Keep gifting consistent across locations"]',
  `industries_served` = '["Corporate and enterprise teams","Retail and customer service","Healthcare and wellness","Education","Non-profit organizations"]',
  `why_choose` = 'When a gesture needs to feel warm and immediate, floral gifting is a timeless choice. NEVER FORGET helps you use 1-800-Flowers thoughtfully within your broader appreciation strategy.'
WHERE `title` = '1-800 Flowers'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with 1-800-Flowers?' AS `question`, 'NEVER FORGET partners with 1-800-Flowers to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = '1-800 Flowers'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- Vista Print
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'vista-print', `slug`),
  `short_description` = 'Print and brand materials that support polished business presentation.',
  `overview` = 'Vistaprint helps businesses create professional print and brand materials, from business cards to marketing essentials.

NEVER FORGET collaborates with Vistaprint so organizations can keep their presentation materials consistent, professional, and ready for client-facing use.',
  `services` = '["Business cards and stationery","Branded marketing materials","Print collateral for teams","Event and presentation materials","Professional identity essentials"]',
  `features` = '["Fast and accessible print options","Professional templates and finishes","Useful for growing teams","Consistent brand presentation","Broad product availability"]',
  `benefits` = '["Maintain a polished brand image","Equip teams with essential materials","Support launches, events, and daily operations","Simplify ordering for standard print needs"]',
  `industries_served` = '["Small and mid-size businesses","Sales organizations","Agencies and consultancies","Professional services","Local and regional brands"]',
  `why_choose` = 'Vistaprint is a practical solution for everyday brand materials. NEVER FORGET helps businesses keep these essentials aligned with their broader appreciation and brand experience.'
WHERE `title` = 'Vista Print'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Vistaprint?' AS `question`, 'NEVER FORGET partners with Vistaprint to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'Vista Print'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- Amazon Associate
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'amazon-associate', `slug`),
  `short_description` = 'Flexible gift options with broad selection for diverse recipient needs.',
  `overview` = 'Amazon Associate gifting provides flexibility when recipients have varied preferences or when speed and selection matter most.

NEVER FORGET can help organizations use Amazon-based gifting thoughtfully as part of a broader appreciation strategy, especially for diverse teams and fast turnaround needs.',
  `services` = '["Flexible gift selection support","Fast-turnaround recognition options","Multi-category appreciation gifts","Remote-team gifting support","Occasion-based gift coordination"]',
  `features` = '["Broad product variety","Useful for mixed recipient preferences","Convenient for distributed teams","Fast fulfillment potential","Flexible budget ranges"]',
  `benefits` = '["Accommodate diverse tastes easily","Support remote and hybrid workforces","Respond quickly to last-minute recognition needs","Keep appreciation programs adaptable"]',
  `industries_served` = '["Remote-first companies","Technology organizations","Distributed customer support teams","Startups and scale-ups","Multi-location businesses"]',
  `why_choose` = 'Amazon Associate options are valuable when flexibility and speed are priorities. NEVER FORGET helps keep these gifts aligned with your recognition standards and recipient experience.'
WHERE `title` = 'Amazon Associate'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Amazon Associate?' AS `question`, 'NEVER FORGET partners with Amazon Associate to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'Amazon Associate'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- Quality Logo Products
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'quality-logo-products', `slug`),
  `short_description` = 'Branded promotional products for professional recognition and visibility.',
  `overview` = 'Quality Logo Products provides branded promotional merchandise that supports both appreciation and brand visibility.

Through NEVER FORGET, organizations can use Quality Logo Products for onboarding kits, event gifts, employee swag, and professional thank-you items.',
  `services` = '["Custom branded merchandise","Employee welcome and onboarding kits","Event and conference gifts","Client promotional packages","Logo product sourcing and coordination"]',
  `features` = '["Wide product catalog","Custom logo branding options","Useful everyday items","Scalable for large programs","Strong brand-visibility value"]',
  `benefits` = '["Combine appreciation with brand awareness","Equip teams with practical branded items","Support events and campaigns efficiently","Create consistent brand presentation"]',
  `industries_served` = '["Corporate marketing teams","Trade show and event organizers","Franchise and multi-location brands","Startups and growing companies","Associations and membership groups"]',
  `why_choose` = 'Quality Logo Products is a practical partner for branded appreciation. NEVER FORGET helps align merchandise choices with your program goals and brand standards.'
WHERE `title` = 'Quality Logo Products'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Quality Logo Products?' AS `question`, 'NEVER FORGET partners with Quality Logo Products to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'Quality Logo Products'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- Cheryl's Cookies
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'cheryls-cookies', `slug`),
  `short_description` = 'Fresh-baked cookie gifts for warm and memorable recognition.',
  `overview` = 'Cheryl\'s Cookies is known for fresh-baked cookie gifts that feel personal, approachable, and celebratory.

NEVER FORGET partners with Cheryl\'s Cookies to help organizations recognize achievements, birthdays, milestones, and everyday moments of appreciation.',
  `services` = '["Cookie gift boxes and tins","Occasion and holiday collections","Employee birthday and milestone gifts","Client appreciation gifts","Coordinated delivery for teams and individuals"]',
  `features` = '["Fresh-baked quality","Attractive gift packaging","Popular for all ages and teams","Seasonal and classic assortments","Ideal for lighthearted recognition"]',
  `benefits` = '["Create an instant feel-good moment","Offer a gift that is easy to enjoy and share","Support frequent recognition without formality barriers","Build culture through small, consistent gestures"]',
  `industries_served` = '["Corporate workplaces","Call centers and service teams","Education and training organizations","Healthcare staff recognition","Retail operations"]',
  `why_choose` = 'Cheryl\'s Cookies is a reliable choice when you want recognition that feels friendly and genuinely appreciated. NEVER FORGET helps integrate these gifts into structured appreciation programs.'
WHERE `title` = 'Cheryl\'s Cookies'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Cheryl\'s Cookies?' AS `question`, 'NEVER FORGET partners with Cheryl\'s Cookies to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'Cheryl\'s Cookies'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- Fruit Bouquets
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'fruit-bouquets', `slug`),
  `short_description` = 'Fresh fruit arrangements for healthy and thoughtful gifting.',
  `overview` = 'Fruit Bouquets creates fresh fruit arrangements that offer a healthier, vibrant alternative for appreciation gifting.

NEVER FORGET works with Fruit Bouquets to help organizations send colorful, thoughtful gifts for wellness-minded recognition, thank-you moments, and celebrations.',
  `services` = '["Fresh fruit arrangements","Occasion-based fruit gifts","Wellness-inspired appreciation gifts","Client and employee recognition","Delivery coordination for special dates"]',
  `features` = '["Fresh and visually appealing designs","Health-conscious gifting alternative","Suitable for many occasions","Memorable presentation","Works well for home or office delivery"]',
  `benefits` = '["Offer a thoughtful alternative to sweets-only gifts","Support inclusive recipient preferences","Make appreciation feel fresh and modern","Strengthen relationships with a personal gesture"]',
  `industries_served` = '["Healthcare and wellness","Corporate HR programs","Hospitality","Education","Professional services"]',
  `why_choose` = 'Fruit Bouquets is an excellent choice when you want appreciation gifts that feel fresh, colorful, and considerate. NEVER FORGET helps align selections with your recognition calendar.'
WHERE `title` = 'Fruit Bouquets'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Fruit Bouquets?' AS `question`, 'NEVER FORGET partners with Fruit Bouquets to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'Fruit Bouquets'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- Harry & David
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'harry-david', `slug`),
  `short_description` = 'Premium gourmet gifts for meaningful corporate appreciation.',
  `overview` = 'Harry & David is a trusted name in gourmet gifting, known for premium fruits, gourmet assortments, and beautifully presented gift collections.

Through NEVER FORGET, organizations can use Harry & David selections to recognize employees, clients, and partners with gifts that feel personal, refined, and memorable.',
  `services` = '["Gourmet gift baskets and collections","Premium fruit and specialty food gifts","Occasion-based corporate gifting","Employee and client recognition gifts","Scheduled and coordinated delivery support"]',
  `features` = '["High-quality gourmet product selection","Elegant presentation and packaging","Seasonal and year-round gift options","Suitable for executive and client appreciation","Flexible gifting for multiple occasions"]',
  `benefits` = '["Elevate brand perception through premium gifting","Create a lasting impression with quality products","Simplify appreciation programs with trusted selections","Support consistent recognition across teams and clients"]',
  `industries_served` = '["Corporate offices","Professional services","Healthcare organizations","Financial services","Hospitality and travel"]',
  `why_choose` = 'Harry & David is ideal when you want appreciation gifts that feel elevated and thoughtfully curated. NEVER FORGET helps you select the right offerings and manage delivery so your recognition moments are seamless from start to finish.'
WHERE `title` = 'Harry & David'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Harry & David?' AS `question`, 'NEVER FORGET partners with Harry & David to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'Harry & David'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- The Popcorn Factory
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'the-popcorn-factory', `slug`),
  `short_description` = 'Popcorn gift tins and snack collections for fun team recognition.',
  `overview` = 'The Popcorn Factory specializes in popcorn gift tins and snack collections that bring a fun, shareable energy to appreciation moments.

NEVER FORGET partners with The Popcorn Factory to help companies celebrate teams, milestones, and thank-you occasions with gifts that are enjoyable and easy to share.',
  `services` = '["Popcorn gift tins and towers","Assorted snack collections","Team celebration gifts","Employee appreciation packages","Event and meeting gift options"]',
  `features` = '["Shareable gift formats","Colorful and festive presentation","Popular for office environments","Multiple size and assortment options","Great for group recognition"]',
  `benefits` = '["Encourage team sharing and celebration","Create a light, positive recognition moment","Support culture-building initiatives","Offer an approachable gift for mixed audiences"]',
  `industries_served` = '["Corporate teams","Call centers","Retail and operations staff","Education institutions","Event organizers"]',
  `why_choose` = 'The Popcorn Factory is a strong fit for team celebrations and upbeat recognition. NEVER FORGET helps you select assortments that fit your audience and occasion.'
WHERE `title` = 'The Popcorn Factory'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with The Popcorn Factory?' AS `question`, 'NEVER FORGET partners with The Popcorn Factory to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'The Popcorn Factory'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- AMERICAN DIGITAL AGENCY LLC
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'american-digital-agency-llc', `slug`),
  `short_description` = 'Digital-focused partner support for modern brand and engagement needs.',
  `overview` = 'American Digital Agency LLC collaborates with NEVER FORGET to support modern digital engagement and brand presentation needs connected to appreciation and corporate experience programs.

Together, we help organizations present recognition initiatives with clarity, professionalism, and a strong digital presence.',
  `services` = '["Digital presentation support","Brand-aligned communication materials","Campaign creative collaboration","Digital engagement assets","Program presentation assistance"]',
  `features` = '["Modern digital approach","Brand-conscious deliverables","Useful for campaign-driven recognition","Supports professional communication","Flexible collaboration model"]',
  `benefits` = '["Strengthen digital presentation of recognition programs","Keep brand messaging consistent","Support launches and campaigns effectively","Improve clarity across stakeholder communications"]',
  `industries_served` = '["Marketing teams","Corporate communications","Agencies and brand partners","Growing digital-first companies","Event and campaign organizers"]',
  `why_choose` = 'American Digital Agency LLC helps NEVER FORGET clients keep recognition and brand experiences looking modern and cohesive across digital touchpoints.'
WHERE `title` = 'AMERICAN DIGITAL AGENCY LLC'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with American Digital Agency LLC?' AS `question`, 'NEVER FORGET partners with American Digital Agency LLC to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'AMERICAN DIGITAL AGENCY LLC'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- disney
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'disney', `slug`),
  `short_description` = 'Memorable travel and experience-inspired appreciation opportunities.',
  `overview` = 'Disney represents world-class experiences that create lasting memories for individuals and families.

Through NEVER FORGET, organizations can explore Disney-related appreciation opportunities as part of premium recognition, incentive, and celebration programs.',
  `services` = '["Experience-based recognition options","Premium incentive support","Celebration and milestone appreciation","Family-friendly reward experiences","High-impact recognition planning"]',
  `features` = '["Strong emotional and memorable value","Ideal for top-performer incentives","Appeals across many age groups","Premium recognition positioning","Excellent for major milestones"]',
  `benefits` = '["Create unforgettable recognition moments","Motivate with high-value experiences","Strengthen loyalty through meaningful rewards","Differentiate your incentive programs"]',
  `industries_served` = '["Sales incentive programs","Corporate recognition events","Hospitality and entertainment partners","Membership and loyalty programs","Executive appreciation initiatives"]',
  `why_choose` = 'Disney experiences can turn recognition into a lasting memory. NEVER FORGET helps evaluate when experience-based rewards are the right fit for your goals.'
WHERE `title` = 'disney'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Disney?' AS `question`, 'NEVER FORGET partners with Disney to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'disney'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- viking
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'viking', `slug`),
  `short_description` = 'Premium travel experiences for high-impact incentive recognition.',
  `overview` = 'Viking is associated with refined travel experiences that work well for premium incentives and executive appreciation.

NEVER FORGET can help organizations explore Viking-related travel recognition as part of elevated reward and incentive strategies.',
  `services` = '["Premium travel incentive options","Executive appreciation experiences","High-value recognition planning","Milestone celebration rewards","Travel-based incentive coordination support"]',
  `features` = '["Premium travel positioning","Strong incentive appeal","Suitable for top-tier recognition","Memorable long-term value","Differentiated reward experience"]',
  `benefits` = '["Motivate high performers with meaningful rewards","Create aspirational incentive programs","Support executive and top-client appreciation","Elevate your recognition brand"]',
  `industries_served` = '["Sales leadership programs","Corporate incentive travel","Executive recognition","Luxury and hospitality partnerships","High-performance team rewards"]',
  `why_choose` = 'Viking is a strong option when your recognition goal is premium and experience-driven. NEVER FORGET helps align travel incentives with your program design.'
WHERE `title` = 'viking'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Viking?' AS `question`, 'NEVER FORGET partners with Viking to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'viking'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- sandal
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'sandal', `slug`),
  `short_description` = 'Destination experiences for premium celebration and incentive rewards.',
  `overview` = 'Sandals is known for destination experiences that can power premium celebration and incentive recognition.

NEVER FORGET helps organizations explore Sandals-related appreciation options when travel rewards are part of a high-impact recognition strategy.',
  `services` = '["Destination incentive options","Premium celebration rewards","Travel-based appreciation planning","Top-performer incentive support","Experience-focused recognition guidance"]',
  `features` = '["Strong leisure and celebration appeal","Memorable destination value","Ideal for major achievements","Premium incentive positioning","High recipient excitement potential"]',
  `benefits` = '["Drive engagement with aspirational rewards","Celebrate major wins memorably","Support loyalty and retention initiatives","Create standout recognition campaigns"]',
  `industries_served` = '["Sales incentive programs","Corporate celebration rewards","Hospitality partnerships","Membership reward programs","Performance-based recognition teams"]',
  `why_choose` = 'Sandals destination experiences can make major achievements feel extraordinary. NEVER FORGET helps determine the right moments to use travel-based recognition.'
WHERE `title` = 'sandal'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Sandals?' AS `question`, 'NEVER FORGET partners with Sandals to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'sandal'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- balloons
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'balloons', `slug`),
  `short_description` = 'Celebratory balloon gifts that add energy to recognition moments.',
  `overview` = 'Balloon gifts bring color and celebration to birthdays, milestones, congratulations, and team wins.

NEVER FORGET offers balloon-based appreciation options to help organizations create fun, visible recognition moments that lift workplace spirit.',
  `services` = '["Celebration balloon arrangements","Birthday and milestone gifts","Congratulations and achievement gifts","Office celebration displays","Occasion-based delivery coordination"]',
  `features` = '["High-visibility celebration impact","Fun and energetic presentation","Great for office environments","Works well with other gift add-ons","Ideal for quick recognition moments"]',
  `benefits` = '["Make celebrations feel festive instantly","Boost team morale with visible recognition","Complement larger gift packages","Create shareable appreciation moments"]',
  `industries_served` = '["Corporate offices","Retail teams","Healthcare staff recognition","Education workplaces","Customer support centers"]',
  `why_choose` = 'Balloons are a simple way to make appreciation feel celebratory. NEVER FORGET helps use them thoughtfully as part of a complete recognition experience.'
WHERE `title` = 'balloons'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Balloons?' AS `question`, 'NEVER FORGET partners with Balloons to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'balloons'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- perfect gifts
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'perfect-gifts', `slug`),
  `short_description` = 'Curated gift options designed for thoughtful corporate appreciation.',
  `overview` = 'Perfect Gifts represents curated gift selections designed to make appreciation feel intentional and well-matched to the recipient.

NEVER FORGET uses Perfect Gifts options to help organizations recognize employees and clients with gifts that feel personal, polished, and occasion-ready.',
  `services` = '["Curated gift selection","Occasion-based appreciation gifts","Employee and client recognition","Custom gift coordination","Multi-recipient gifting support"]',
  `features` = '["Thoughtfully curated options","Flexible for many occasions","Professional presentation","Suitable for mixed audiences","Easy to align with recognition themes"]',
  `benefits` = '["Reduce guesswork in gift selection","Deliver consistent appreciation quality","Support both personal and professional recognition","Save time for busy HR and managers"]',
  `industries_served` = '["Corporate HR teams","Client success organizations","Professional services","Retail and operations leadership","Small and mid-size businesses"]',
  `why_choose` = 'Perfect Gifts is a practical partner when you want curated, reliable appreciation options. NEVER FORGET helps match each gift to the right moment and audience.'
WHERE `title` = 'perfect gifts'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Perfect Gifts?' AS `question`, 'NEVER FORGET partners with Perfect Gifts to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'perfect gifts'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- e card
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'e-card', `slug`),
  `short_description` = 'Digital greeting cards for timely and thoughtful recognition.',
  `overview` = 'E-cards make it easy to send timely appreciation with a personal message, even across locations and time zones.

NEVER FORGET supports e-card recognition so organizations can celebrate birthdays, thank-you moments, and milestones quickly and professionally.',
  `services` = '["Digital greeting cards","Occasion-based e-card messages","Employee birthday and thank-you cards","Client appreciation notes","Scheduled digital recognition support"]',
  `features` = '["Instant delivery potential","Personal messaging options","Ideal for remote teams","Low-friction recognition format","Professional and warm communication style"]',
  `benefits` = '["Recognize people in the moment","Support distributed teams easily","Reduce missed birthdays and milestones","Complement physical gifts with personal notes"]',
  `industries_served` = '["Remote and hybrid companies","Corporate HR programs","Customer success teams","Education organizations","Global multi-office businesses"]',
  `why_choose` = 'E-cards keep appreciation timely and personal. NEVER FORGET helps integrate digital greetings into a consistent recognition rhythm.'
WHERE `title` = 'e card'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with E-Cards?' AS `question`, 'NEVER FORGET partners with E-Cards to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'e card'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- aquamarine
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'aquamarine', `slug`),
  `short_description` = 'Refined partner offerings for distinctive appreciation experiences.',
  `overview` = 'Aquamarine is part of NEVER FORGET’s collaborator network, supporting distinctive appreciation experiences for organizations that want polished recognition options.

Our team helps you understand available offerings and match them to the right employees, clients, and occasions.',
  `services` = '["Curated appreciation offerings","Occasion-based recognition support","Employee and client gifting options","Program coordination assistance","Personalized recommendation support"]',
  `features` = '["Professional presentation","Flexible use across occasions","Aligned with appreciation best practices","Suitable for mixed audiences","Supported by NEVER FORGET coordination"]',
  `benefits` = '["Expand your recognition toolkit","Offer distinctive appreciation choices","Maintain a polished recipient experience","Simplify partner-based gifting decisions"]',
  `industries_served` = '["Corporate organizations","Professional services","Hospitality partners","Client relationship teams","Recognition and rewards programs"]',
  `why_choose` = 'Aquamarine adds another refined option within the NEVER FORGET collaborator network. Our team helps you select and deliver the right experience for each occasion.'
WHERE `title` = 'aquamarine'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Aquamarine?' AS `question`, 'NEVER FORGET partners with Aquamarine to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'aquamarine'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);

-- Tango
UPDATE `collaborators` SET
  `slug` = IF(`slug` IS NULL OR `slug` = '' OR `slug` LIKE 'collaborator-%', 'tango', `slug`),
  `short_description` = 'Digital rewards and choice-based gifting for modern recognition programs.',
  `overview` = 'Tango supports modern digital rewards and choice-based gifting experiences that fit today’s distributed workplaces.

NEVER FORGET partners with Tango to help organizations offer flexible recognition options that recipients can redeem in ways that feel personal and convenient.',
  `services` = '["Digital reward delivery","Choice-based gift experiences","Employee recognition rewards","Remote team appreciation options","Program-ready digital gifting support"]',
  `features` = '["Fast digital delivery","Recipient choice and flexibility","Ideal for remote and hybrid teams","Modern recognition experience","Easy to scale across large groups"]',
  `benefits` = '["Increase reward relevance for recipients","Reduce shipping complexity","Support inclusive recognition preferences","Streamline large recognition campaigns"]',
  `industries_served` = '["Technology companies","Remote and hybrid organizations","Customer experience teams","Corporate HR programs","Global and multi-region businesses"]',
  `why_choose` = 'Tango is an excellent fit for flexible, modern recognition. NEVER FORGET helps integrate digital rewards into a complete appreciation strategy.'
WHERE `title` = 'Tango'
  AND (`overview` IS NULL OR `overview` = '');

INSERT INTO `collaborator_faqs` (`collaborator_id`, `question`, `answer`, `sort_order`, `status`, `created_at`, `updated_at`)
SELECT c.`id`, q.`question`, q.`answer`, q.`sort_order`, '1', NOW(), NOW()
FROM `collaborators` c
JOIN (
SELECT 'How does NEVER FORGET work with Tango?' AS `question`, 'NEVER FORGET partners with Tango to help organizations deliver thoughtful appreciation gifts with coordinated ordering, timing, and presentation support.' AS `answer`, 1 AS `sort_order`
UNION ALL
SELECT 'Can gifts be customized for our company?' AS `question`, 'Yes. Depending on the product selection, many options can be tailored with branding, personal messages, occasion themes, and delivery preferences.' AS `answer`, 2 AS `sort_order`
UNION ALL
SELECT 'Do you support bulk or multi-location deliveries?' AS `question`, 'Absolutely. We can help coordinate individual, bulk, and multi-recipient deliveries so your appreciation program stays organized and on schedule.' AS `answer`, 3 AS `sort_order`
) q
WHERE c.`title` = 'Tango'
  AND NOT EXISTS (SELECT 1 FROM `collaborator_faqs` f WHERE f.`collaborator_id` = c.`id`);
