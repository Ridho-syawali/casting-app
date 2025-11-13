@props(['film'])

<style>
    .film-poster-header {
        min-height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #fff;
        padding-top: 4rem;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .section-description {
        font-size: 1.125rem;
        line-height: 1.6;
        max-width: 800px;
        margin: 0 auto;
    }

    .poster-scroll-container {
        display: flex;
        overflow-x: auto;
        overflow-y: hidden;
        padding: 0 1rem;
        gap: 2rem;
        max-height: 850px;
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .poster-scroll-container::-webkit-scrollbar {
        display: none;
    }

    .poster-card-col {
        flex: 0 0 500px;
        max-width: 500px;
        min-width: 500px;
    }

    .poster-card {
        position: relative;
        height: 700px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .poster-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.5s ease;
    }

    .poster-card:hover img {
        transform: scale(1.08);
    }

    .poster-info-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0.7) 70%, transparent 100%);
        padding: 2.5rem 2rem 2rem;
        transform: translateY(100%);
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .poster-card:hover .poster-info-overlay {
        transform: translateY(0);
    }

    .poster-title {
        color: #fff;
        font-weight: 700;
        margin-bottom: 1rem;
        font-size: 1.5rem;
        line-height: 1.3;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .poster-description {
        color: rgba(255, 255, 255, 0.95);
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .btn-read-more {
        background-color: #f3f3f3;
        color: #000;
        border: none;
        padding: 0.65rem 1.5rem;
        border-radius: 8px;
        font-size: 0.95rem;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-read-more:hover {
        background-color: #ee0000;
        color: white;
        transform: translateX(5px);
        box-shadow: 0 4px 12px rgba(238, 0, 0, 0.3);
    }

    .btn-read-more i {
        transition: transform 0.3s ease;
    }

    .btn-read-more:hover i {
        transform: translateX(3px);
    }

    @media (max-width: 1200px) {
        .poster-card-col {
            flex: 0 0 400px;
            min-width: 400px;
            max-width: 400px;
        }

        .poster-card {
            height: 600px;
        }

        .section-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 768px) {
        .film-poster-header {
            min-height: 200px;
            padding: 1.5rem 0;
        }

        .section-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .section-description {
            font-size: 0.95rem;
        }

        .poster-card-col {
            flex: 0 0 320px;
            min-width: 320px;
            max-width: 320px;
        }

        .poster-card {
            height: 480px;
        }

        .poster-scroll-container {
            padding: 2rem 1rem;
            gap: 1.5rem;
        }

        .poster-info-overlay {
            padding: 2rem 1.5rem 1.5rem;
        }

        .poster-title {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .poster-description {
            font-size: 0.9rem;
            margin-bottom: 1.25rem;
        }
    }

    @media (max-width: 576px) {
        .poster-card-col {
            flex: 0 0 280px;
            min-width: 280px;
            max-width: 280px;
        }

        .poster-card {
            height: 420px;
        }

        .poster-info-overlay {
            padding: 1.5rem 1.25rem 1.25rem;
        }

        .poster-title {
            font-size: 1.1rem;
        }

        .poster-description {
            font-size: 0.85rem;
        }

        .btn-read-more {
            padding: 0.55rem 1.25rem;
            font-size: 0.875rem;
        }
    }
</style>

<div class="container-fluid p-0">
    <div class="film-poster-header">
        <div class="container-fluid">
            <div class="row align-items-center px-3 px-md-4">
                <div class="col-lg-2 col-md-3 mb-3 mb-lg-0">
                    <h2 class="section-title mb-0">Film</h2>
                </div>

                <div class="col-lg-8 col-md-6 mb-3 mb-lg-0">
                    <p class="section-description text-md-center mb-0 fs-5">
                        This section showcases films featuring talents cast through ACI, representing
                        the creative results of collaborations between casting directors and filmmakers.
                    </p>
                </div>

                <div class="col-lg-2 col-md-3 text-md-end">
                    <h2 class="section-title mb-0">Poster</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5">
            <div class="poster-scroll-container">

                @foreach ($film as $item)
                    <div class="poster-card-col">
                        <div class="poster-card">
                            <img src="{{ $item['image'] }}" alt="{{ $item['Nama_Film'] }}">
                            <div class="poster-info-overlay">
                                <h5 class="poster-title">{{ $item['Nama_Film'] }}</h5>
                                <p class="poster-description">{{ $item['Deskripsi_singkat'] }}</p>
                                <a href="#" class="btn-read-more">
                                    Read More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>

</div>
