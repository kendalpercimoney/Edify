<?php
header("Access-Control-Allow-Origin: *");

// Set the timezone to your local timezone
date_default_timezone_set('Europe/London');

// Generate the URL for the image
$imageNumber = (date('z') + 1); // Use the day of the month as the image number
$imageUrl = 'https://firstiimpression.com/Edify/images/' . $imageNumber . '.jpg';

// Generate the verse for the day
$verses = array(
    "Romans 15:13 - May the God of hope fill you with all joy and peace in believing, so that by the power of the Holy Spirit you may abound in hope.",
    "Isaiah 40:28a - Do you not know? Have you not heard? The Lord is the everlasting God, the Creator of the ends of the earth.",
    "Isaiah 40:28b – He will not grow tired or weary, and his understanding no one can fathom.",
    "Romans 8:24 - For in this hope we were saved. But hope that is seen is no hope at all. Who hopes for what he already has?",
    "Romans 8:25 But if we hope for what we do not yet have, we wait for it patiently.",
    "Isaiah 40:31 - but those who hope in the Lord will renew their strength. They will soar on wings like eagles; they will run and not grow weary, they will walk and not be faint.",
    "Romans 15:4 - For everything that was written in the past was written to teach us, so that through endurance and the encouragement of the Scriptures we might have hope.",
    "Psalm 23:4 - I will fear no evil; For You are with me; Your rod and Your staff, they comfort me.",
    "Psalm 27:1 - The Lord is my light and my salvation; Whom shall I fear? The Lord is the strength of my life; Of whom shall I be afraid?",
    "Isaiah 41:10 - Fear not, for I am with you; Be not dismayed, for I am your God. I will strengthen you, Yes, I will help you, I will uphold you with My righteous right hand.",
    "Romans 5:5 - And hope does not put us to shame, because God's love has been poured out into our hearts through the Holy Spirit, who has been given to us",
    "Hebrews 11:1 - Now faith is confidence in what we hope for and assurance about what we do not see.",
    "Psalm 42:5 - Why, my soul, are you downcast? Why so disturbed within me? Put your hope in God, for I will yet praise him, my Saviour and my God.",
    "1 John 4:9 - This is how God showed his love among us: He sent his one and only Son into the world that we might live through him.",
    "Matthew 22:37 - Jesus replied: 'Love the Lord your God with all your heart and with all your soul and with all your mind.'",
    "Romans 8:35 - Who shall seperate us from the love of Christ? Shall trouble or hardship or persecution or famine or nakedness or danger or sword?",
    "2 Timothy 1:7 - For the Spirit of God does not make us timid, but gives us power, love and self-discipline.",
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
    "Matthew 11:28 - Come to me, all who labour and are heavy laden, and I will give you rest.",
    "Matthew 11:29 - Take my yoke upon you, and learn from me, for I am gentle and lowly in heart, and you will find rest for your souls.",
    "Matthew 11:30 - For my yoke is easy, and my burden is light.",
    "2 Cor. 13:11 - Finally, brothers, rejoice. Aim for restoration, comfort one another, agree with one another, live in peace; and the God of love and peace will be with you.",
    "Psalm 39:7 -  But now, Lord, what do I look for? My hope is in you.",
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
    "2 Corinthians 5:7 - Therefore we are always confident and know that as long as we are at home in the body we are away from the Lord. For we live by faith, not by sight.",
//
    "Deuteronomy 31:8 - The Lord himself goes before you and will be with you; he will never leave you nor forsake you. Do not be afraid; do not be discouraged.",
    "Psalm 28:7a - The Lord is my strength and my shield; my heart trusts in him, and he helps me.",
    "Psalm 28:7b - My heart leaps for joy, and with my song I praise him.",
    "1 Peter 5:5 - God opposes the proud, but shows favour to the humble.",
    "Isaiah 41:13 - For I am the Lord your God who takes hold of your right hand and says to you, Do not fear; I will help you.",
    "John 16:33 - In this world you will have trouble. But take heart! I have overcome the world.",
    "Psalm 18:2 - The Lord is my rock, my fortress and my deliverer; my God is my rock, in whom I take refuge, my shield and the horn of my salvation, my stronghold.",
    "2 Cor. 4:16 - Therefore we do not lose heart. Though outwardly we are wasting away, yet inwardly we are being renewed day by day.",
    "2 Cor. 4:17 - For our light and momentary troubles are achieving for us an eternal glory that far outweighs them all.",
    "2 Cor. 4:18 - So we fix our eyes not on what is seen, but on what is unseen, since what is seen is temporary, but what is unseen is eternal.",
    "Romans 8:28 - And we know that in all things God works for the good of those who love him, who have been called according to his purpose.",
    "Psalm 34:18 - The Lord is close to the broken-hearted and saves those who are crushed in spirit.",
    "Jeremiah 17:7 - But blessed is the one who trusts in the Lord, whose confidence is in him.",
    "Matthew 5:3 - Blessed are the poor in spirit, for theirs is the kingdom of heaven.",
    "Matthew 5:4 - Blessed are those who mourn, for they will be comforted.",
    "Matthew 5:5 - Blessed are the meek, for they will inherit the earth.",
    "Matthew 5:6 - Blessed are those who hunger and thirst for righteousness, for they will be filled.",
    "Matthew 5:7 - Blessed are the merciful, for they will be shown mercy.",
    "Matthew 5:8 - Blessed are the pure in heart, for they will see God.",
    "Matthew 5:9 - Blessed are the peacemakers, for they will be called children of God.",
    "Matthew 5:10 - Blessed are those who are persecuted because of righteousness, for theirs is the kingdom of heaven.",
    "Matthew 28:20b - And surely I am with you always, to the very end of the age.",
    "Psalm 34:4 I sought the Lord, and he answered me; he delivered me from all my fears.",
    "John 3:18 - Whoever believes in Jesus is not condemned.",
    "John 6:47 - Very truly I tell you, the one who believes has eternal life.",
    "Leviticus 21:8b - I the LORD am holy — I who make you holy.",
    "Luke 12:8 - Whoever acknowledges me before men, the Son of man will also acknowledge before the angels of God.",
    "Mark 11:24 - Therefore I tell you, whatever you ask in prayer, believe that you have received it, and it will be yours.",
    "Mark 11:24 - And whenever you stand praying, forgive, if you have anything against anyone, so that your Father also who is in heaven may forgive you your trespasses.",
    "Matthew 10:30 - And even the very hairs of your head are all numbered. So don’t be afraid; you are worth more than many sparrows.",
    "2 Cor 12:8 - Three times I pleaded with the Lord about this, that it should leave me. But he said to me, “My grace is sufficient for you, for my power is made perfect in weakness.",
    ""












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