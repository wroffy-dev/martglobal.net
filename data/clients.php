<?php
/**
 * Clients & Partners by sector  ->  future tables `client_sectors`, `clients`.
 *
 * SAMPLE DATA for the client demo. Names are illustrative and logos are
 * generated wordmarks — replace with MART's confirmed client list and
 * approved logo files (set 'logo' => 'images/clients/xyz.png').
 *
 * Each client: [name, short mark (1–3 chars), brand colour]
 */
$CLIENT_SECTORS = [
    'fmcg' => [
        'name' => 'FMCG', 'icon' => 'store',
        'description' => 'Rural go-to-market, last-mile distribution and consumer insight for leading consumer brands.',
        'clients' => [
            ['Hindustan Unilever', 'HUL', '#1f36c7'], ['Dabur', 'D', '#0b7a3b'], ['Colgate-Palmolive', 'CP', '#d4001a'],
            ['Marico', 'M', '#0063a6'], ['ITC Limited', 'ITC', '#1a3f7a'],
        ],
    ],
    'construction' => [
        'name' => 'Construction', 'icon' => 'layers',
        'description' => 'Community engagement, rehabilitation & resettlement and social impact studies for infrastructure projects.',
        'clients' => [
            ['Larsen & Toubro', 'L&T', '#1c3f94'], ['Tata Projects', 'TP', '#00377b'], ['Shapoorji Pallonji', 'SP', '#9b1b30'],
            ['Afcons', 'AF', '#e05a00'],
        ],
    ],
    'financial' => [
        'name' => 'Financial', 'icon' => 'target',
        'description' => 'Financial inclusion research, rural banking strategy and microfinance programme design.',
        'clients' => [
            ['NABARD', 'NB', '#0b5a2a'], ['State Bank of India', 'SBI', '#2d6fb7'], ['ICICI Bank', 'IC', '#b0272d'],
            ['HDFC Bank', 'HD', '#004c8f'], ['SIDBI', 'SI', '#5b2c83'],
        ],
    ],
    'agri-business' => [
        'name' => 'Agri-Business', 'icon' => 'leaf',
        'description' => 'FPO promotion, agri value chains and agribusiness ecosystem development.',
        'clients' => [
            ['World Bank', 'WB', '#00538a'], ['SFAC', 'SF', '#2e7d32'], ['Escorts', 'E', '#c62828'],
            ['Eicher', 'EI', '#0d47a1'], ['IFFCO', 'IF', '#1b5e20'],
        ],
    ],
    'climate-change-forestry' => [
        'name' => 'Climate Change and Forestry', 'icon' => 'spark',
        'description' => 'Climate-resilient livelihoods, adaptation research and community forestry programmes.',
        'clients' => [
            ['UNDP', 'UN', '#0468b1'], ['GIZ', 'GIZ', '#c30f0f'], ['WWF India', 'WWF', '#000000'],
            ['IUCN', 'IU', '#0a6b48'],
        ],
    ],
    'csr' => [
        'name' => 'CSR', 'icon' => 'heart',
        'description' => 'CSR strategy, implementation and impact assessment for responsible businesses.',
        'clients' => [
            ['Tata Steel', 'TS', '#004e9a'], ['Microsoft', 'MS', '#737373'], ['HPCL', 'HP', '#003f87'],
            ['Vedanta', 'V', '#e4002b'], ['NTPC', 'NT', '#00539f'],
        ],
    ],
    'entrepreneurship-development' => [
        'name' => 'Entrepreneurship Development', 'icon' => 'bulb',
        'description' => 'Women and youth entrepreneur networks, enterprise incubation and skill building.',
        'clients' => [
            ['USAID', 'US', '#002f6c'], ['Ashoka', 'A', '#f26722'], ['Grameen Foundation', 'GF', '#6a1b9a'],
            ['Accenture', 'AC', '#a100ff'],
        ],
    ],
    'forestry-environment' => [
        'name' => 'Forestry & Environment', 'icon' => 'leaf',
        'description' => 'Environmental studies, natural resource management and forest-based livelihoods.',
        'clients' => [
            ['MoEFCC', 'MoE', '#2e7d32'], ['The Nature Conservancy', 'TNC', '#49a942'], ['TERI', 'TE', '#00796b'],
            ['ICIMOD', 'IC', '#00838f'],
        ],
    ],
    'livelihoods' => [
        'name' => 'Livelihoods', 'icon' => 'users',
        'description' => 'Farm, non-farm and livestock livelihood promotion with governments and donors.',
        'clients' => [
            ['Heifer International', 'HI', '#00843d'], ['World Vision', 'WV', '#ff6b00'], ['IFAD', 'IF', '#00548c'],
            ['DAY-NRLM', 'NR', '#b71c1c'], ['CARE India', 'CA', '#f39200'],
        ],
    ],
    'water-sanitation' => [
        'name' => 'Water & Sanitation', 'icon' => 'home',
        'description' => 'Sanitation enterprise models, WASH behaviour change and market-based solutions.',
        'clients' => [
            ['UNICEF', 'UC', '#1cabe2'], ['WaterAid', 'WA', '#0095d9'], ['Water.org', 'W', '#00a1de'],
            ['Bill & Melinda Gates Foundation', 'BMG', '#1a1a1a'],
        ],
    ],
    'health-nutrition' => [
        'name' => 'Health & Nutrition', 'icon' => 'heart',
        'description' => 'Inclusive health models, nutrition programmes and rural healthcare access.',
        'clients' => [
            ['Novartis', 'N', '#0460a9'], ['GSK', 'GSK', '#f36633'], ['PATH', 'PA', '#00a3ad'],
            ['GAIN', 'GA', '#7cb342'], ['Abbott', 'AB', '#008fc5'],
        ],
    ],
];
