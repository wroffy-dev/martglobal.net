<?php
/**
 * Demo content store.
 *
 * This file intentionally mirrors the future MySQL schema so the front-end
 * can later switch to database queries without template changes:
 *
 *   service_categories   -> $CATEGORIES
 *   services             -> $SERVICES          (keyed by slug)
 *   service_relations    -> $SERVICES[*]['related_services']   (many-to-many, cross-category)
 *   service_projects     -> $SERVICES[*]['related_projects']
 *   service_focus_areas  -> $SERVICES[*]['focus_areas']
 *   focus_areas          -> $FOCUS_AREAS
 *   projects             -> $PROJECTS
 *   testimonials         -> $TESTIMONIALS
 *   clients              -> $CLIENTS
 *
 * Images: remote photography is used as a placeholder. Replace with MART's own
 * photography by dropping files into /assets/images and updating the paths.
 */

$IMG = static fn(string $id, int $w = 1600): string =>
    "https://images.unsplash.com/{$id}?auto=format&fit=crop&w={$w}&q=70";

$CATEGORIES = [
    'corporate' => [
        'slug'        => 'corporate',
        'name'        => 'Corporate',
        'title'       => 'Corporate Solutions',
        'tagline'     => 'Research, strategy and business transformation.',
        'intro'       => 'We help businesses decode rural and emerging markets — from consumer insight and market strategy to new business models and on-ground activation that reaches the last mile.',
        'cross_title' => 'Looking for Social Solutions?',
        'cross_text'  => 'Explore how MART Global works across communities, CSR, implementation and market linkages.',
        'hero_image'  => $IMG('photo-1552664730-d307ca884978'),
    ],
    'social' => [
        'slug'        => 'social',
        'name'        => 'Social',
        'title'       => 'Social Solutions',
        'tagline'     => 'Large-scale implementation and social impact.',
        'intro'       => 'We design and deliver programmes that improve livelihoods at scale — partnering with governments, donors, foundations and corporates to turn intent into measurable impact.',
        'cross_title' => 'Looking for Corporate Solutions?',
        'cross_text'  => 'Explore our research, strategy, business innovation and strategic activation capabilities.',
        'hero_image'  => $IMG('photo-1500382017468-9049fed747ef'),
    ],
];

$SERVICES = [
    /* ---------------------------------------------------------------- CORPORATE */
    'research-and-strategy' => [
        'category'          => 'corporate',
        'name'              => 'Research & Strategy',
        'icon'              => 'search',
        'display_order'     => 1,
        'short_description' => 'Consumer, market and ecosystem research that turns rural complexity into clear, actionable strategy.',
        'intro'             => 'Three decades of listening to rural India. We translate deep market understanding into strategies that work on the ground — not just on paper.',
        'full_description'  => [
            'MART Global conducts market and business research for corporates, international non-profit institutions and government organisations. Our expertise lies in understanding emerging markets and Base of the Pyramid (BoP) segments — their ecosystems, behaviours and dynamics.',
            'We combine quantitative studies with ethnographic immersion, so every recommendation is grounded in how rural consumers, retailers and communities actually think, buy and live.',
        ],
        'offerings'         => ['Rural consumer & shopper insight', 'Market sizing & entry strategy', 'Go-to-market & distribution strategy', 'Baseline, mid-line & impact evaluations', 'Social & policy research', 'Ecosystem & value-chain mapping'],
        'approach'          => [
            ['Research', 'Mixed-method studies across villages, haats and households.'],
            ['Analyse', 'Turn field data into segments, patterns and opportunities.'],
            ['Strategise', 'Co-create market strategy and business cases with your team.'],
            ['Activate', 'Pilot on the ground and refine with real-world feedback.'],
            ['Measure', 'Track outcomes and scale what works.'],
        ],
        'sectors'           => ['FMCG', 'Agriculture & Agri-inputs', 'Financial Services', 'Healthcare', 'Energy', 'Development Sector'],
        'related_services'  => ['large-scale-program-implementation', 'csr-solutions', 'market-linkages'],
        'related_projects'  => ['project-shakti', 'arogya-parivar', 'agribusiness-promotion-facility'],
        'focus_areas'       => ['agriculture', 'rural-markets', 'business-innovation'],
        'hero_image'        => $IMG('photo-1454165804606-c3d57bc86b40'),
        'seo_title'         => 'Rural Market Research & Strategy Consulting | MART Global',
        'seo_description'   => 'Rural and emerging-market research, consumer insight and go-to-market strategy from MART Global — demystifying rural markets since 1993.',
    ],
    'business-model-innovation' => [
        'category'          => 'corporate',
        'name'              => 'Business Model Innovation',
        'icon'              => 'bulb',
        'display_order'     => 2,
        'short_description' => 'Designing inclusive, profitable business models for low-income and last-mile markets.',
        'intro'             => 'From Shakti Amma to Arogya Parivar — we have co-created some of India\'s most recognised last-mile business models.',
        'full_description'  => [
            'Reaching rural and low-income consumers profitably requires more than a smaller pack size. It needs new distribution, new partnerships and new ways of creating value for everyone in the chain.',
            'Using the MART 3i Innovation Framework — Inquiry, Immersion and Implementation — we help organisations design, test and scale products, services and distribution models built for emerging markets.',
        ],
        'offerings'         => ['Last-mile distribution models', 'Inclusive product & service design', 'Women & youth entrepreneur networks', 'Pilot design and scale-up planning', 'Partnership & channel models', 'Innovation workshops'],
        'approach'          => [
            ['Inquiry', 'Frame the problem and the opportunity with stakeholders.'],
            ['Immersion', 'Live the market — with consumers, retailers and communities.'],
            ['Ideate', 'Develop and stress-test business model options.'],
            ['Implement', 'Pilot, learn and build the scale-up roadmap.'],
        ],
        'sectors'           => ['FMCG', 'Healthcare', 'Energy & Clean Cooking', 'Sanitation', 'Financial Inclusion', 'Agri-business'],
        'related_services'  => ['market-linkages', 'large-scale-program-implementation', 'project-management-advisory'],
        'related_projects'  => ['project-shakti', 'arogya-parivar', 'rural-sanitation-entrepreneurs'],
        'focus_areas'       => ['business-innovation', 'entrepreneurship', 'rural-markets'],
        'hero_image'        => $IMG('photo-1556761175-5973dc0f32e7'),
        'seo_title'         => 'Inclusive Business Model Innovation | MART Global',
        'seo_description'   => 'Last-mile and inclusive business model design for rural and emerging markets using the MART 3i Innovation Framework.',
    ],
    'strategic-activation' => [
        'category'          => 'corporate',
        'name'              => 'Strategic Activation',
        'icon'              => 'target',
        'display_order'     => 3,
        'short_description' => 'Taking brands and programmes to rural audiences through on-ground activation that builds trust.',
        'intro'             => 'Strategy only matters when it reaches people. We activate brands, products and ideas in the heart of rural India.',
        'full_description'  => [
            'Rural audiences respond to experiences, credibility and community — not just advertising. Our activation programmes engage consumers, influencers and channel partners where they live, shop and gather.',
            'Every activation is designed with measurable outcomes: trial, adoption, channel expansion and behaviour change.',
        ],
        'offerings'         => ['Rural brand activation', 'Haat & mela engagement', 'Influencer & community programmes', 'Channel & retailer engagement', 'Behaviour change communication', 'Demand generation pilots'],
        'approach'          => [
            ['Understand', 'Map audiences, touchpoints and local influencers.'],
            ['Design', 'Create culturally relevant engagement formats.'],
            ['Deploy', 'Run activation with trained local teams.'],
            ['Measure', 'Track reach, trial and conversion in real time.'],
        ],
        'sectors'           => ['FMCG', 'Consumer Durables', 'Agri-inputs', 'Telecom', 'Healthcare', 'Public Programmes'],
        'related_services'  => ['csr-solutions', 'market-linkages', 'large-scale-program-implementation'],
        'related_projects'  => ['project-shakti', 'arogya-parivar'],
        'focus_areas'       => ['rural-markets', 'community-development', 'business-innovation'],
        'hero_image'        => $IMG('photo-1529156069898-49953e39b3ac'),
        'seo_title'         => 'Rural Activation & Brand Engagement | MART Global',
        'seo_description'   => 'On-ground rural activation, channel engagement and behaviour change programmes that deliver measurable outcomes.',
    ],
    'rural-immersion-program' => [
        'category'          => 'corporate',
        'name'              => 'Rural Immersion Program',
        'icon'              => 'compass',
        'display_order'     => 4,
        'short_description' => '“Decoding The New Rural” — classroom insight combined with field immersion for leaders and teams.',
        'intro'             => 'The fastest way to understand rural India is to experience it. Our immersion programmes take leaders out of the boardroom and into the village.',
        'full_description'  => [
            'MART Global conducts customised training and rural immersion programmes that combine classroom learning with structured field visits. Participants understand rural consumer behaviour, purchase decisions, lifestyle, brand usage and the wider ecosystem.',
            'Built on decades of field experience, “Decoding The New Rural” balances theory with practical insight — helping marketing, sales and leadership teams execute rural strategy with confidence.',
        ],
        'offerings'         => ['Leadership rural immersion', 'Sales & marketing team immersions', 'Custom training programmes', 'Rural marketing masterclasses', 'Innovation & design-thinking sprints', 'Development sector capacity building'],
        'approach'          => [
            ['Brief', 'Align immersion goals with business priorities.'],
            ['Learn', 'Classroom sessions on the new rural consumer.'],
            ['Immerse', 'Guided village, household and market visits.'],
            ['Apply', 'Translate insight into team action plans.'],
        ],
        'sectors'           => ['FMCG', 'Banking & Insurance', 'Automotive', 'Agri-business', 'Consumer Durables', 'Development Organisations'],
        'related_services'  => ['large-scale-program-implementation', 'project-management-advisory', 'csr-solutions'],
        'related_projects'  => ['agribusiness-promotion-facility', 'fpo-promotion-sfac'],
        'focus_areas'       => ['rural-markets', 'livelihoods', 'agriculture'],
        'hero_image'        => $IMG('photo-1464226184884-fa280b87c399'),
        'seo_title'         => 'Rural Immersion Program – Decoding The New Rural | MART Global',
        'seo_description'   => 'Customised rural immersion and training programmes combining classroom learning and field visits for business leaders and teams.',
    ],

    /* ------------------------------------------------------------------- SOCIAL */
    'large-scale-program-implementation' => [
        'category'          => 'social',
        'name'              => 'Large-Scale Program Implementation',
        'icon'              => 'layers',
        'display_order'     => 1,
        'short_description' => 'Delivering livelihood and development programmes at scale across farm, non-farm and livestock sectors.',
        'intro'             => 'From design to last-mile delivery — we implement programmes that reach hundreds of thousands of households.',
        'full_description'  => [
            'MART Global has undertaken numerous livelihood promotion ventures across farm, non-farm and livestock sectors. We bring the systems, people and partnerships needed to implement complex programmes across states and regions.',
            'Our teams work alongside government departments, donors and communities to ensure programmes are delivered on time, with quality, and with outcomes that last beyond the project cycle.',
        ],
        'offerings'         => ['Livelihood programme delivery', 'Farmer Producer Organisation (FPO) promotion', 'Community institution building', 'Entrepreneurship promotion', 'Skill development programmes', 'Programme MIS & monitoring'],
        'approach'          => [
            ['Design', 'Programme architecture, targets and theory of change.'],
            ['Mobilise', 'Community mobilisation and institution building.'],
            ['Deliver', 'Field implementation through trained local teams.'],
            ['Monitor', 'Real-time MIS and quality assurance.'],
            ['Sustain', 'Exit strategies that keep impact going.'],
        ],
        'sectors'           => ['Agriculture', 'Livestock', 'Rural Non-farm', 'Skills & Employment', 'Women Empowerment', 'Water & Sanitation'],
        'related_services'  => ['research-and-strategy', 'business-model-innovation', 'strategic-activation'],
        'related_projects'  => ['fpo-promotion-sfac', 'macp-maharashtra', 'agribusiness-promotion-facility'],
        'focus_areas'       => ['livelihoods', 'agriculture', 'community-development'],
        'hero_image'        => $IMG('photo-1574943320219-553eb213f72d'),
        'seo_title'         => 'Large-Scale Livelihood Programme Implementation | MART Global',
        'seo_description'   => 'Implementation of large-scale livelihood, FPO and community development programmes across India.',
    ],
    'project-management-advisory' => [
        'category'          => 'social',
        'name'              => 'Project Management & Advisory',
        'icon'              => 'clipboard',
        'display_order'     => 2,
        'short_description' => 'Programme management units, technical advisory and governance support for complex development projects.',
        'intro'             => 'Trusted by multilateral agencies and governments to set up, manage and advise high-stakes development programmes.',
        'full_description'  => [
            'Development programmes succeed when strategy, systems and stakeholders stay aligned. MART Global provides Project Management Units (PMUs), technical assistance and advisory support to ensure programmes stay on track.',
            'We were engaged by the World Bank team as management consultants to set up the Agribusiness Promotion Facility (ABPF) to increase the uptake of agribusiness — one example of how we combine programme management with market expertise.',
        ],
        'offerings'         => ['Project Management Units (PMU)', 'Technical assistance', 'Programme design & appraisal', 'Monitoring, evaluation & learning', 'Policy advisory', 'Institutional strengthening'],
        'approach'          => [
            ['Assess', 'Diagnose programme goals, gaps and governance.'],
            ['Structure', 'Set up PMUs, processes and reporting systems.'],
            ['Advise', 'Embedded technical and strategic advisory.'],
            ['Learn', 'Evaluate, document and share what works.'],
        ],
        'sectors'           => ['Agribusiness', 'Rural Development', 'Public Policy', 'Multilateral Programmes', 'Skills', 'Financial Inclusion'],
        'related_services'  => ['research-and-strategy', 'business-model-innovation', 'rural-immersion-program'],
        'related_projects'  => ['agribusiness-promotion-facility', 'macp-maharashtra', 'fpo-promotion-sfac'],
        'focus_areas'       => ['agriculture', 'rural-markets', 'livelihoods'],
        'hero_image'        => $IMG('photo-1542744173-8e7e53415bb0'),
        'seo_title'         => 'Development Project Management & Advisory | MART Global',
        'seo_description'   => 'PMU set-up, technical assistance and advisory for government and multilateral development programmes.',
    ],
    'csr-solutions' => [
        'category'          => 'social',
        'name'              => 'CSR Solutions',
        'icon'              => 'heart',
        'display_order'     => 3,
        'short_description' => 'End-to-end CSR strategy, implementation and impact assessment — including rehabilitation & resettlement.',
        'intro'             => 'Helping companies move from CSR compliance to CSR that creates real, measurable value for communities.',
        'full_description'  => [
            'MART Global partners with corporates to design and deliver CSR programmes aligned to business priorities and community needs. Our expertise spans needs assessment, programme design, implementation and impact assessment.',
            'We also implement Rehabilitation & Resettlement (R&R) interventions and livelihood enhancement initiatives — prioritising entrepreneurship promotion, skill development and education.',
        ],
        'offerings'         => ['CSR strategy & policy', 'Needs & baseline assessment', 'Programme implementation', 'Rehabilitation & Resettlement (R&R)', 'Employee engagement', 'Impact assessment & reporting'],
        'approach'          => [
            ['Assess', 'Community needs, stakeholder and baseline studies.'],
            ['Align', 'Connect CSR priorities with business and SDGs.'],
            ['Implement', 'Deliver with communities and local partners.'],
            ['Report', 'Independent impact assessment and reporting.'],
        ],
        'sectors'           => ['Mining & Metals', 'Energy & Power', 'Manufacturing', 'Infrastructure', 'Technology', 'FMCG'],
        'related_services'  => ['research-and-strategy', 'strategic-activation', 'business-model-innovation'],
        'related_projects'  => ['rural-sanitation-entrepreneurs', 'fpo-promotion-sfac'],
        'focus_areas'       => ['csr-sustainability', 'community-development', 'livelihoods'],
        'hero_image'        => $IMG('photo-1488521787991-ed7bbaae773c'),
        'seo_title'         => 'CSR Strategy, Implementation & Impact Assessment | MART Global',
        'seo_description'   => 'CSR strategy, implementation, R&R and impact assessment that creates measurable value for communities and companies.',
    ],
    'market-linkages' => [
        'category'          => 'social',
        'name'              => 'Market Linkages',
        'icon'              => 'link',
        'display_order'     => 4,
        'short_description' => 'Connecting farmers, artisans and rural enterprises to markets, buyers, finance and value chains.',
        'intro'             => 'Livelihoods grow when producers reach markets. We build the bridges between rural producers and the buyers who need them.',
        'full_description'  => [
            'Producers in rural India often lose value because they are disconnected from markets, information and finance. MART Global builds sustainable linkages between producer groups, FPOs, rural entrepreneurs and buyers.',
            'We supported entrepreneurs to tap the rural sanitation business by developing business and marketing plans and establishing financial linkages — and we facilitate FPOs to become sustainable, viable businesses.',
        ],
        'offerings'         => ['Buyer & value-chain linkages', 'FPO business planning', 'Financial linkages & credit access', 'Marketing & branding for producer groups', 'Aggregation & supply-chain design', 'Digital market access'],
        'approach'          => [
            ['Map', 'Value chains, buyers and market gaps.'],
            ['Organise', 'Aggregate producers into viable enterprises.'],
            ['Connect', 'Build buyer, finance and service linkages.'],
            ['Scale', 'Strengthen businesses for long-term viability.'],
        ],
        'sectors'           => ['Agriculture & Horticulture', 'Dairy & Livestock', 'Handicrafts', 'Sanitation', 'Rural Retail', 'Food Processing'],
        'related_services'  => ['research-and-strategy', 'business-model-innovation', 'strategic-activation'],
        'related_projects'  => ['fpo-promotion-sfac', 'rural-sanitation-entrepreneurs', 'agribusiness-promotion-facility'],
        'focus_areas'       => ['market-linkages', 'agriculture', 'entrepreneurship'],
        'hero_image'        => $IMG('photo-1488459716781-31db52582fe9'),
        'seo_title'         => 'Market Linkages for Farmers & Rural Enterprises | MART Global',
        'seo_description'   => 'Building market, buyer and financial linkages for FPOs, farmers and rural entrepreneurs.',
    ],
];

$FOCUS_AREAS = [
    'agriculture' => [
        'name' => 'Agriculture', 'audience' => 'corporate', 'icon' => 'leaf',
        'description' => 'Farmer producer organisations, agribusiness and value chains.',
        'image' => $IMG('photo-1500937386664-56d1dfef3854', 900),
        'services' => ['research-and-strategy', 'business-model-innovation', 'strategic-activation', 'large-scale-program-implementation', 'project-management-advisory', 'market-linkages'],
    ],
    'rural-markets' => [
        'name' => 'Rural Markets', 'audience' => 'corporate', 'icon' => 'store',
        'description' => 'Understanding and reaching the rural consumer.',
        'image' => $IMG('photo-1534723452862-4c874018d66d', 900),
        'services' => ['research-and-strategy', 'strategic-activation', 'rural-immersion-program', 'market-linkages', 'project-management-advisory'],
    ],
    'livelihoods' => [
        'name' => 'Livelihoods', 'audience' => 'social', 'icon' => 'users',
        'description' => 'Farm, non-farm and livestock livelihood promotion.',
        'image' => $IMG('photo-1593113598332-cd288d649433', 900),
        'services' => ['research-and-strategy', 'rural-immersion-program', 'large-scale-program-implementation', 'csr-solutions', 'market-linkages'],
    ],
    'csr-sustainability' => [
        'name' => 'CSR & Sustainability', 'audience' => 'social', 'icon' => 'heart',
        'description' => 'Responsible business that creates shared value.',
        'image' => $IMG('photo-1559027615-cd4628902d4a', 900),
        'services' => ['research-and-strategy', 'strategic-activation', 'csr-solutions', 'large-scale-program-implementation'],
    ],
    'market-linkages' => [
        'name' => 'Market Linkages', 'audience' => 'corporate', 'icon' => 'link',
        'description' => 'Connecting producers to buyers, finance and markets.',
        'image' => $IMG('photo-1488459716781-31db52582fe9', 900),
        'services' => ['business-model-innovation', 'research-and-strategy', 'market-linkages', 'large-scale-program-implementation'],
    ],
    'entrepreneurship' => [
        'name' => 'Entrepreneurship', 'audience' => 'social', 'icon' => 'spark',
        'description' => 'Women, youth and rural entrepreneur networks.',
        'image' => $IMG('photo-1556740758-90de374c12ad', 900),
        'services' => ['business-model-innovation', 'strategic-activation', 'market-linkages', 'csr-solutions', 'large-scale-program-implementation'],
    ],
    'community-development' => [
        'name' => 'Community Development', 'audience' => 'social', 'icon' => 'home',
        'description' => 'Strong community institutions and inclusive growth.',
        'image' => $IMG('photo-1469571486292-0ba58a3f068b', 900),
        'services' => ['strategic-activation', 'research-and-strategy', 'large-scale-program-implementation', 'csr-solutions', 'project-management-advisory'],
    ],
    'business-innovation' => [
        'name' => 'Business Innovation', 'audience' => 'corporate', 'icon' => 'bulb',
        'description' => 'Inclusive models for low-income and last-mile markets.',
        'image' => $IMG('photo-1531482615713-2afd69097998', 900),
        'services' => ['business-model-innovation', 'research-and-strategy', 'strategic-activation', 'market-linkages', 'project-management-advisory'],
    ],
];

/* Projects – names and descriptions drawn from MART's publicly known work.
   Impact metrics are qualitative placeholders; replace with verified figures. */
$PROJECTS = [
    'project-shakti' => [
        'name' => 'Shakti Amma – Last-Mile Distribution', 'category' => 'corporate',
        'client' => 'Hindustan Unilever', 'location' => 'Rural India',
        'description' => 'A women-led rural distribution model that took FMCG products to villages while creating micro-entrepreneurs.',
        'impact' => 'Women micro-entrepreneurs', 'image' => $IMG('photo-1609220136736-443140cffec6', 900),
    ],
    'arogya-parivar' => [
        'name' => 'Arogya Parivar', 'category' => 'corporate',
        'client' => 'Novartis', 'location' => 'Rural India',
        'description' => 'An inclusive health business model improving access to medicines and health education in rural communities.',
        'impact' => 'Rural health access', 'image' => $IMG('photo-1576091160550-2173dba999ef', 900),
    ],
    'agribusiness-promotion-facility' => [
        'name' => 'Agribusiness Promotion Facility', 'category' => 'social',
        'client' => 'World Bank', 'location' => 'India',
        'description' => 'Management consultancy to set up the ABPF and increase the uptake of agribusiness across the value chain.',
        'impact' => 'Agribusiness ecosystem', 'image' => $IMG('photo-1625246333195-78d9c38ad449', 900),
    ],
    'fpo-promotion-sfac' => [
        'name' => 'FPO Promotion with SFAC', 'category' => 'social',
        'client' => 'SFAC', 'location' => 'Haryana · Odisha · Jharkhand',
        'description' => 'Mobilising farmer interest groups and facilitating FPOs to become sustainable, viable businesses.',
        'impact' => '3 states', 'image' => $IMG('photo-1500382017468-9049fed747ef', 900),
    ],
    'macp-maharashtra' => [
        'name' => 'Maharashtra Agricultural Competitiveness Project', 'category' => 'social',
        'client' => 'Government of Maharashtra', 'location' => 'Maharashtra',
        'description' => 'Supporting farmer competitiveness through producer organisations, market access and agribusiness development.',
        'impact' => 'State-wide programme', 'image' => $IMG('photo-1523348837708-15d4a09cfac2', 900),
    ],
    'rural-sanitation-entrepreneurs' => [
        'name' => 'Rural Sanitation Entrepreneurs', 'category' => 'social',
        'client' => 'Development Partners', 'location' => 'India',
        'description' => 'Business and marketing plans plus financial linkages that helped entrepreneurs tap the rural sanitation market.',
        'impact' => 'Enterprise-led WASH', 'image' => $IMG('photo-1541544537156-7627a7a4aa1c', 900),
    ],
];

/* Testimonials – PLACEHOLDER copy for the demo. Replace with approved client quotes. */
$TESTIMONIALS = [
    ['name' => 'Client Name', 'designation' => 'Head of Rural Marketing', 'organization' => 'Leading FMCG Company', 'audience' => 'corporate',
     'quote' => 'MART helped our leadership team see rural India through a completely new lens. The immersion translated directly into a sharper go-to-market plan.'],
    ['name' => 'Client Name', 'designation' => 'Programme Director', 'organization' => 'International Development Agency', 'audience' => 'social',
     'quote' => 'A rare partner that understands both the market and the community. Their implementation teams delivered with discipline and genuine empathy.'],
    ['name' => 'Client Name', 'designation' => 'CSR Head', 'organization' => 'Infrastructure Company', 'audience' => 'social',
     'quote' => 'From needs assessment to impact reporting, MART made our CSR programme more focused, more measurable and more meaningful for communities.'],
    ['name' => 'Client Name', 'designation' => 'VP – Rural Business', 'organization' => 'Financial Services Company', 'audience' => 'corporate',
     'quote' => 'Their research gave us a clear picture of rural customers and channels. We used it to redesign our distribution model and scale faster.'],
];

/* Homepage logo strip: [name, audience] — audience drives the personalised homepage. */
$CLIENTS = [
    ['USAID', 'social'], ['Microsoft', 'corporate'], ['Heifer International', 'social'], ['Tata Steel', 'corporate'],
    ['World Vision', 'social'], ['World Bank', 'social'], ['Hindustan Unilever', 'corporate'], ['Novartis', 'corporate'],
    ['Colgate-Palmolive', 'corporate'], ['SFAC', 'social'],
];

$STATS = [
    ['value' => 250, 'suffix' => '+', 'label' => 'Clients'],
    ['value' => 1000, 'suffix' => '+', 'label' => 'Projects'],
    ['value' => 1, 'suffix' => 'M+', 'label' => 'Lives Impacted'],
    ['value' => 500, 'suffix' => '+', 'label' => 'Years of Collective Experience'],
    ['value' => 100, 'suffix' => '%', 'label' => 'Committed to Impact'],
];
