@props(['team'])


<style>
    .scrollable-cards-container {
        display: flex;
        overflow-x: auto;
        overflow-y: hidden;
        padding: 2rem 1rem;
        gap: 1.5rem;
        max-height: 600px;
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .scrollable-cards-container::-webkit-scrollbar {
        display: none;
    }

    .card-col {
        flex: 0 0 320px;
        max-width: 320px;
        min-width: 280px;
    }

    .team-card {
        position: relative;
        height: 450px;
        overflow: hidden;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .team-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.5s ease;
    }

    .team-card:hover img {
        transform: scale(1.1);
    }

    .card-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0.7) 70%, transparent 100%);
        padding: 2rem 1.5rem 1.5rem;
        transform: translateY(100%);
        transition: transform 0.4s ease;
    }

    .team-card:hover .card-overlay {
        transform: translateY(0);
    }

    .card-overlay h5 {
        color: #fff;
        font-weight: 600;
        margin-bottom: 0.75rem;
        font-size: 1.25rem;
    }

    .card-overlay p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.9rem;
        line-height: 1.4;
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .btn-read-more {
        background-color: #f3f3f3;
        color: black;
        border: none;
        padding: 0.5rem 1.25rem;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-read-more:hover {
        background-color: #c40506;
        color: white;
        transform: translateX(4px);
    }

    .header-section {
        background: linear-gradient(135deg, #ee0000 0%, #c40506 100%);
        min-height: 200px;
    }

    .our-team-btn {
        background: transparent;
        border: 2px solid white;
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 1rem;
    }

    .our-team-btn:hover {
        background: white;
        color: #ee0000;
    }

    .collapse-icon {
        transition: transform 0.3s ease;
    }

    .our-team-btn[aria-expanded="false"] .collapse-icon {
        transform: rotate(180deg);
    }

    @media (max-width: 768px) {
        .card-col {
            flex: 0 0 280px;
            min-width: 260px;
        }

        .team-card {
            height: 400px;
        }

        .our-team-btn {
            width: 100%;
            justify-content: center;
            padding: 0.875rem 1.5rem;
        }

        .scrollable-cards-container {
            padding: 1.5rem 1rem;
        }
    }

    @media (max-width: 576px) {
        .card-col {
            flex: 0 0 260px;
            min-width: 240px;
        }

        .team-card {
            height: 380px;
        }

        .card-overlay {
            padding: 1.5rem 1rem 1rem;
        }

        .card-overlay h5 {
            font-size: 1.1rem;
        }
    }
</style>

<div class="container-fluid p-0">
    <div class="header-section">
        <div class="container-fluid">
            <div class="row align-items-center p-3 p-md-4">
                <div class="col-lg-5 col-md-7 mb-3 mb-md-0">
                    <h2 class="text-white fw-bold mb-2 mb-md-3 fs-2 fs-md-3">ASOSIASI CASTING INDONESIA</h2>
                    <p class="text-white mb-0 pe-lg-5 fs-5 fs-md-5 ">
                        ACI casting director & associates is a member of the Indonesian film board that is certified
                        and
                        works globally to collaborate with filmmakers.
                    </p>
                </div>
                <div class="col-lg-7 col-md-5 text-md-end">
                    <button class="our-team-btn" type="button" data-bs-toggle="collapse" data-bs-target="#teamCollapse"
                        aria-expanded="true" aria-controls="teamCollapse">
                        <i class="fas fa-chevron-up collapse-icon"></i>
                        <span>Our Team</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="collapse show py-5 bg-white" id="teamCollapse">
        <div class="container-fluid">
            <div class="scrollable-cards-container">

                @foreach ($team as $data)
                    <div class="card-col">
                        <div class="team-card">
                            <img src="{{ $data['image'] }}" alt="{{ $data['nama'] }}">
                            <div class="card-overlay">
                                <h5 class="border-bottom">{{ $data['nama'] }}</h5>
                                <p>{{ $data['pengenalan_singkat'] }}</p>
                                <a href="#" class="btn-read-more">Read More <i
                                        class="fas fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const collapseElement = document.getElementById('teamCollapse');
        const button = document.querySelector('[data-bs-target="#teamCollapse"]');
        const icon = button.querySelector('.collapse-icon');

        function updateIcon() {
            if (collapseElement.classList.contains('show')) {
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            } else {
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            }
        }

        updateIcon();

        collapseElement.addEventListener('show.bs.collapse', updateIcon);
        collapseElement.addEventListener('hide.bs.collapse', updateIcon);
    });
</script>
