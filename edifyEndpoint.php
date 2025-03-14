<?php
header("Access-Control-Allow-Origin: *");

// Set the timezone
date_default_timezone_set('Europe/London');

// Generate the URL for the image
$imageNumber = (date('z') + 1); // Use the day of the month as the image number
$imageUrl = 'https://firstiimpression.com/Edify/images/' . $imageNumber . '.jpg';

// Generate the verse for the day
$verses = array(
    
    "James 1:2 - Consider it pure joy, my brothers and sisters, whenever you face trials of many kinds, because you know that the testing of your faith produces perseverance.",
    "James 1:4 - Let perseverance finish its work so that you may be mature and complete, not lacking anything.",
    "John 16:33 - I have said these things to you, that in me you may have peace. In the world you will have tribulation. But take heart; I have overcome the world.",
    "Isaiah 26:3 - You keep him in perfect peace whose mind is stayed on you, because he trusts in you.",
    "Psalms 4:8 - In peace I will lie down and sleep, for you alone, LORD, make me dwell in safety.",
    "John 14:27 - Peace I leave with you; my peace I give to you. Not as the world gives do I give to you. Let not your hearts be troubled, neither let them be afraid.",
    "Romans 12:18 - If possible, so far as it depends on you, live peaceably with all.",
    "Colossians 3:15 - And let the peace of Christ rule in your hearts, to which indeed you were called in one body. And be thankful.",
    "Ecclesiastes 7:9 - Do not be quickly provoked in your spirit, for anger resides in the lap of fools.",
    "Romans 12:12 - Be joyful in hope, patient in affliction, faithful in prayer.",
    "Proverbs 15:18 - A hot-tempered person stirs up conflict, but the one who is patient calms a quarrel.",
    "Philippians 4:6 Do not be anxious about anything, but in every situation, by prayer and petition, with thanksgiving, present your requests to God.",
    "Ephesians 4:2 - Be completely humble and gentle; be patient, bearing with one another in love.",
    "Ephesians 4:32 - Be kind and compassionate to one another, forgiving each other, just as in Christ God forgave you.",
    "Micah 6:8 - He has shown you, O mortal, what is good. And what does the LORD require of you? To act justly and to love mercy and to walk humbly with your God.",
    "Proverbs 15:1 - A gentle answer turns away wrath, but a harsh word stirs up anger.",
    "Philippians 4:5 - Let your gentleness be evident to all. The Lord is near.",
    "Hebrews 10:23 - Let us hold unswervingly to the hope we profess, for he who promised is faithful.",
    "1 Corinthians 1:9 - God is faithful, who has called you into fellowship with his Son, Jesus Christ our Lord.",
    "1 Corinthians 10:13a - No temptation has overtaken you except what is common to mankind. And God is faithful; he will not let you be tempted beyond what you can bear.",
    "1 Corinthians 10:13b - But when you are tempted, he will also provide a way out so that you can endure it.",
    "Proverbs 25:28 - Like a city whose walls are broken through is a person who lacks self-control.",
    "Proverbs 18:21 - The tongue has the power of life and death, and those who love it will eat its fruit.",
    "1 Thess. 5:8 - But since we belong to the day, let us be sober, putting on faith and love as a breastplate, and the hope of salvation as a helmet.",
    "1 Corinthians 9:25 - Everyone who competes in the games goes into strict training. They do it to get a crown that will not last, but we do it to get a crown that will last forever.",
    "Romans 12:1 - Therefore, I urge you, brothers and sisters, in view of God's mercy, to offer your bodies as a living sacrifice, holy and pleasing to God—this is your true and proper worship.",
    "Romans 12:2 - Do not conform to the pattern of this world, but be transformed by the renewing of your mind. Then you will be able to test and approve what God's will is - his good, pleasing and perfect will.",
    "Psalm 23:1 The Lord is my shepherd, I shall lack nothing.",
    "Psalm 23:2 He makes me lie down in green pastures, he leads me beside quiet waters",
    "Psalm 23:3 he restores my soul. He guides me in paths of righteousness for his name's sake.",
    "Psalm 23:4 Even though I walk through the valley of the shadow of death, I will fear no evil, for you are with me; your rod and your staff, they comfort me.",
    "Psalm 23:5 You anoint my head with oil; my cup overflows.",
    "Psalm 23:5 You prepare a table before me in the presence of my enemies.",
    "Psalm 23:6 Surely goodness and love will follow me all the days of my life, and I will dwell in the house of the LORD forever.",
    "Psalm 32:8 I will instruct you and teach you in the way you should go.",
    "Psalm 31:23 The Lord preserves the faithful.",
    "Psalm 37:28 For the Lord loves the just and will not forsake his faithful one. They will be protected forever.",
    "Psalm 4:8 I will lie down and sleep in peace, for you alone, O Lord, make me dwell in safety.",
    "Psalm 55:22 Cast your cares on the Lord and he will sustain you.",
    "Psalm 86:5 You are kind and forgiving, O Lord, abounding in love to all who call to you.",
    "Psalm 68:19 Praise be to the Lord, to God our Savior, who daily bears our burdens.",
    "Psalm 28:7 The Lord is my strength and my shield; my heart trusts in him.",
    "Isaiah 12:2 - Surely God is my salvation; I will trust, and not be afraid. The Lord, The Lord, is my strength and my song; he has become my salvation.",
    "Isaiah 25:8 - The Sovereign Lord will wipe away the tears from all faces.",
    "Isaiah 26:19 - But your dead will live; their bodies will rise. You who dwell in the dust, wake up and shout for joy.",
    "Isaiah 26:3 - You will keep in perfect peace him whose mind is steadfast, because he trusts in you.",
    "Isaiah 30:15 - In repentance and rest is your salvation, in quietness and trust is your strength.",
    "Isaiah 30:21 - Whether you turn to the right or to the left, your ears will hear a voice behind you, saying, 'This is the way; walk in it.'",
    "Isaiah 33:22 - For the Lord is our judge; the Lord is our lawgiver; the Lord is our king, it is he who will save us.",
    "Isaiah 33:6 - He will be the sure foundation for your times, a rich store of salvation and wisdom and knowledge.",
    "Isaiah 35:10 - Gladness and joy will overtake them, and sorrow and sighing will flee away.",
    "Isaiah 35:4 - Say to those with fearful hearts, 'Be strong, do not fear, your God will come.'",
    "Isaiah 38:20 - The LORD will save me, and we will sing with stringed instruments",
    "Isaiah 40:11 - He tends his flock like a shepherd: He gathers the lambs in his arms and carries them close to his heart; he gently leads those that have young.",
    "Isaiah 40:31 - Those who hope in the Lord will renew their strength.",
    "Isaiah 41:10 - I will strengthen you and help you; I will uphold you with my righteous right hand.",
    "Isaiah 41:10 - So do not fear, for I am with you; do not be dismayed, for I am your God.",
    "Isaiah 41:13 - I am the Lord, your God, who takes hold of your right hand and says to you, Do not fear; I will help you.",
    "Isaiah 42:16 - I will turn the darkness into light.",
    "Isaiah 43:1 - Fear not, for I have redeemed you; I have called you by name; you are mine.",
    "Isaiah 43:2 - When you pass through the waters, I will be with you.",
    "Isaiah 43:25 - I, even I, am he who blots out your transgressions, for my own sake, and remembers your sins no more.",
    "Isaiah 44:22 - I have swept away your offenses like a cloud, your sins like the morning mist. Return to me, for I have redeemed you.",
    "Isaiah 45:2 - I will go before you and will level the mountains",
    "Isaiah 49:15 - I will not forget you.",
    "Isaiah 49:25 - I will contend with those who contend with you, and your children I will save.",
    "Isaiah 50:7 - Because the Sovereign LORD helps me, I will not be disgraced. Therefore have I set my face like flint, and I know I will not be put to shame.",
    "Isaiah 51:11 - Everlasting joy will crown their heads. Gladness and joy will overtake them, and sorrow and sighing will flee away.",
    "Isaiah 51:12 - I, even I, am he who comforts you.",
    "Isaiah 51:6 - My salvation will last forever.",
    "Isaiah 54:10 - My unfailing love for you will not be shaken nor my covenant of peace be removed.",
    "Isaiah 54:14 - In righteousness you will be established: Tyranny will be far from you; you will have nothing to fear. Terror will be far removed; it will not come near you.",
    "Isaiah 54:17 - No weapon forged against you will prevail, and you will refute every tongue that accuses you. This is the heritage of the servants of the LORD, and this is their vindication from me,” declares the LORD.",
    "Isaiah 54:8 - With everlasting kindness I will have compassion on you.",
    "Isaiah 55:7 - Let the wicked forsake his way and the evil man his thoughts. Let him turn to the LORD, and he will have mercy on him, and to our God, for he will freely pardon.",
    "Isaiah 57:15 - I, the Lord, live in a high and holy place, but also with him who is contrite and lowly in spirit, to revive the spirit of the lowly and revive the heart of the contrite.",
    "Isaiah 57:18 - I have seen his ways, but I will heal him; I will guide him and restore comfort to him.",
    "Isaiah 57:2 - Those who walk uprightly enter into peace; they find rest as they lie in death",
    "Romans 15:13 - May the God of hope fill you with all joy and peace in believing, so that by the power of the Holy Spirit you may abound in hope.",
    "Isaiah 40:28a - Do you not know? Have you not heard? The Lord is the everlasting God, the Creator of the ends of the earth.",
    "Isaiah 40:28b - He will not grow tired or weary, and his understanding no one can fathom.",
    "Romans 8:24 - For in this hope we were saved. But hope that is seen is no hope at all. Who hopes for what he already has?",
    "Romans 8:25 But if we hope for what we do not yet have, we wait for it patiently.",
    "Isaiah 40:31 - But those who hope in the Lord will renew their strength. They will soar on wings like eagles; they will run and not grow weary, they will walk and not be faint.",
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
    "Proverbs 3:19 - By wisdom the Lord laid the earth's foundations, by understanding he set the heavens in place.",
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
    "1 Corinthians 16:13 - Be on your guard; stand firm in the faith; be courageous; be strong.",
    "James 1:6 - But when you ask, you must believe and not doubt, because the one who doubts is like a wave of the sea, blown and tossed by the wind.",
    "Romans 1:17 - For in the gospel the righteousness of God is revealed—a righteousness that is by faith from first to last, just as it is written: 'The righteous will live by faith.'",
    "Galatians 3:26 - So in Christ Jesus you are all children of God through faith.",
    "2 Corinthians 5:7 - Therefore we are always confident and know that as long as we are at home in the body we are away from the Lord. For we live by faith, not by sight.",
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
    "Matthew 10:30 - And even the very hairs of your head are all numbered. So don't be afraid; you are worth more than many sparrows.",
    "2 Cor 12:8 - Three times I pleaded with the Lord about this, that it should leave me. But he said to me, “My grace is sufficient for you, for my power is made perfect in weakness.",
    "Galatians 5:22 - But the fruit of the Spirit is love, joy, peace, forbearance, kindness, goodness, faithfulness, gentleness and self-control. Against such things there is no law.",
    "1 Cor 13:4 - Love is patient, love is kind. It does not envy, it does not boast, it is not proud.",
    "1 Cor 13:5 - Love does not dishonor others, it is not self-seeking, it is not easily angered, it keeps no record of wrongs.",
    "1 Cor 13:6 - Love does not delight in evil but rejoices with the truth.",
    "1 Cor 13:7 - Love always protects, always trusts, always hopes, always perseveres.",
    "1 Cor 13:13 - So now faith, hope, and love abide, these three; but the greatest of these is love.",
    "1 Cor 16:14 - Let all that you do be done in love.",
    "Romans 15:13 - May the God of hope fill you with all joy and peace in believing, so that by the power of the Holy Spirit you may abound in hope.",
    "Philippians 4:4 - Rejoice in the Lord always. I will say it again: Rejoice!"
    
    
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