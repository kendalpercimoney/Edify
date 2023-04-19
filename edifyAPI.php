<?php
header("Access-Control-Allow-Origin: *");

// Set the timezone to your local timezone
date_default_timezone_set('Europe/London');

// Generate the URL for the image
$imageNumber = (date('z') + 1); // Use the day of the month as the image number
$imageUrl = 'https://firstiimpression.com/Edify/images/' . $imageNumber . '.jpg';

// Generate the verse for the day
$verses = array(
    'Day 1',
    'Day 2',
    'Day 3',
    'Day 4',
    'Day 5',
    'Day 6',
    'Day 7',
    'Day 8',
    'Day 9',
    'Day 10',
    'Day 11',
    'Day 12',
    'Day 13',
    'Day 14',
    'Day 15',
    'Day 16',
    'Day 17',
    'Day 18',
    'Day 19',
    'Day 20',
    'Day 21',
    'Day 22',
    'Day 23',
    'Day 24',
    'Day 25',
    'Day 26',
    'Day 27',
    'Day 28',
    'Day 29',
    'Day 30',
    'Day 31',
    'Day 32',
    'Day 33',
    'Day 34',
    'Day 35',
    'Day 36',
    'Day 37',
    'Day 38',
    'Day 39',
    'Day 40',
    'Day 41',
    'Day 42',
    'Day 43',
    'Day 44',
    'Day 45',
    'Day 46',
    'Day 47',
    'Day 48',
    'Day 49',
    'Day 50',
    'Day 51',
    'Day 52',
    'Day 53',
    'Day 54',
    'Day 55',
    'Day 56',
    'Day 57',
    'Day 58',
    'Day 59',
    'Day 60',
    'Day 61',
    'Day 62',
    'Day 63',
    'Psalm 23:4 - I will fear no evil; For You are with me; Your rod and Your staff, they comfort me.',
    'Psalm 27:1 - The Lord is my light and my salvation; Whom shall I fear? The Lord is the strength of my life; Of whom shall I be afraid?',
    'Isaiah 41:10 - Fear not, for I am with you; Be not dismayed, for I am your God. I will strengthen you, Yes, I will help you, I will uphold you with My righteous right hand.',
    'Romans 5:5',
    "Hebrews 11:1 - Now faith is confidence in what we hope for and assurance about what we do not see.",
    "Psalm 42:5 - Why, my soul, are you downcast? Why so disturbed within me? Put your hope in God, for I will yet praise him, my Saviour and my God.",
    "1 John 4:9 - This is how God showed his love among us: He sent his one and only Son into the world that we might live through him.",
    "Matthew 22:37 - Jesus replied: 'Love the Lord your God with all your heart and with all your soul and with all your mind.'",
    "Romans 8:35 - Who shall seperate us from the love of Christ? Shall trouble or hardship or persecution or famine or nakedness or danger or sword?",
    "2 Timothy 1:7 - For the Spirit of God does not make us timid, but gives us power, love and self-discipline.",
    // Add more verses here
    "Psalms 27:14 - Wait for the Lord; be strong and take heart and wait for the Lord.",
    "Romans 12:12 - Be joyful in hope, patient in affliction, faithful in prayer.",
    "Philippians 4:6 - Do not be anxious about anything, but in every situation, by prayer and petition, with thanksgiving, present your requests to God.",
    "Philippians 4:7 - And the peace of God, which transcends all understanding, will guard your hearts and your minds in Christ Jesus.",
    "John 14:27 - Peace I leave with you, my peace I give you. I do not give to you as the world gives. Do not let your hearts be troubled and do not be afraid.",
    "1 Peter 5:7 - Cast all your anxiety on him because he cares for you.",
    "1 John 4:19 - We love because He first loved us.",
    "Psalm 68:34 - Proclaim the power of God, whose majesty is over Israel, whose power is in the heavens.",
    "Psalm 104:1 - Praise the Lord, my soul. Lord my God, you are very great; you are clothed with splendour and majesty.",
    "Proverbs 3:19 - By wisdom the Lord laid the earth’s foundations, by understanding he set the heavens in place.",
    "Proverbs 3:20 - By his knowledge the watery depths were divided, and the clouds let drop their due.",
    "Psalm 25:21 - May integrity and uprightness protect me, because my hope, Lord, is in you.",
    "Lamentations 3:22 - Because of the Lord's great love we are not consumed, for his compassions never fail.",
    "Hebrews 10:24 - And let us consider how we may spur one another on toward love and good deeds",
    "Psalm 46:11 - The Lord of hosts is with us; the God of Jacob is our fortress. Selah",
    "John 8:12 - 'I am the light of the world. Whoever follows me will never walk in darkness, but will have the light of life.'",
    "Matthew 11:28 - Come to me, all who labor and are heavy laden, and I will give you rest.",
    "Matthew 11:29 - Take my yoke upon you, and learn from me, for I am gentle and lowly in heart, and you will find rest for your souls.",
    "Matthew 11:30 - For my yoke is easy, and my burden is light.",
    "2 Cor. 13:11 - Finally, brothers, rejoice. Aim for restoration, comfort one another, agree with one another, live in peace; and the God of love and peace will be with you."
    "Hope you have a blessed easter week!",
    "Hope you have a blessed easter week!",
    "Hope you have a blessed easter week!",
    "Hope you have a blessed easter week!",
    "Hope you have a blessed easter week!",
    "Hope you have a blessed easter week!",
    "Hope you have a blessed easter week!",
    "Hope you have a blessed easter week!",
    "Hope you have a blessed easter week!",
    "Proverbs 2:6 - For the Lord gives wisdom; from his mouth come knowledge and understanding.",
    "Proverbs 9:10 - The fear of the Lord is the beginning of wisdom, and knowledge of the Holy One is understanding.",
    "Proverbs 4:7 - The beginning of wisdom is this: Get wisdom. Though it cost all you have, get understanding.",
    "James 1:5 - If any of you lacks wisdom, you should ask God, who gives generously to all without finding fault, and it will be given to you.",
    "Proverbs 16:21 - The wise in heart are called discerning, and gracious words promote instruction.",
    "Proverbs 3:5 - Trust in the Lord with all your heart and lean not on your own understanding; in all your ways submit to him, and he will make your paths straight.",
    "Proverbs 16:16 - How much better to get wisdom than gold, to get insight rather than silver!",
    "Romans 10:17 - Consequently, faith comes from hearing the message, and the message is heard through the word about Christ.",
    "Hebrews 11:1 - Now faith is confidence in what we hope for and assurance about what we do not see.",
    "Ephesians 2:8-9 - For it is by grace you have been saved, through faith—and this is not from yourselves, it is the gift of God— not by works, so that no one can boast.",
    "James 1:6 - But when you ask, you must believe and not doubt, because the one who doubts is like a wave of the sea, blown and tossed by the wind.",
    "Romans 1:17 - For in the gospel the righteousness of God is revealed—a righteousness that is by faith from first to last, just as it is written: 'The righteous will live by faith.'",
    "Galatians 3:26 - So in Christ Jesus you are all children of God through faith.",
    "2 Corinthians 5:7 - Therefore we are always confident and know that as long as we are at home in the body we are away from the Lord. For we live by faith, not by sight."




);
$verse = $verses[date('z') % count($verses)]; // Use the day of the year to select a verse

// Create an array with the new data
$data = array(
    'imageUrl' => $imageUrl,
    'verse' => $verse
);

// Save the new data to a JSON file
file_put_contents('data.json', json_encode($data));

// Return the new data as a JSON response
header('Content-Type: application/json');
echo json_encode($data);