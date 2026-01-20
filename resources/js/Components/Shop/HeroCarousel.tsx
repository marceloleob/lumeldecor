import React, { useState, useEffect } from 'react';
import { Link } from '@inertiajs/react';

interface Collection {
  id: number;
  name: string;
  slug: string;
  description?: string;
  image?: string;
}

interface HeroCarouselProps {
  collections: Collection[];
}

export default function HeroCarousel({ collections = [] }: HeroCarouselProps) {
  const [currentSlide, setCurrentSlide] = useState(0);

  // Fallback: Se não houver coleções, mostra banner padrão
  const slides =
    collections.length > 0
      ? collections
      : [
          {
            id: 1,
            name: 'Bem-vindo à Lumel Decor',
            slug: 'bem-vindo',
            description: 'Transforme seus momentos especiais em memórias inesquecíveis',
            image: 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=1600&h=600&fit=crop',
          },
          {
            id: 2,
            name: 'Bem-vindo à Lumel Decor',
            slug: 'bem-vindo',
            description: 'Transforme seus momentos especiais em memórias inesquecíveis',
            image: 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=1600&h=600&fit=crop',
          },
          {
            id: 3,
            name: 'Bem-vindo à Lumel Decor',
            slug: 'bem-vindo',
            description: 'Transforme seus momentos especiais em memórias inesquecíveis',
            image: 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=1600&h=600&fit=crop',
          },
        ];

  // Auto-play carousel
  useEffect(() => {
    const timer = setInterval(() => {
      setCurrentSlide((prev) => (prev + 1) % slides.length);
    }, 5000); // Troca a cada 5 segundos

    return () => clearInterval(timer);
  }, [slides.length]);

  const nextSlide = () => {
    setCurrentSlide((prev) => (prev + 1) % slides.length);
  };

  const prevSlide = () => {
    setCurrentSlide((prev) => (prev - 1 + slides.length) % slides.length);
  };

  const goToSlide = (index: number) => {
    setCurrentSlide(index);
  };

  return (
    <section className="relative h-96 md:h-[500px] overflow-hidden bg-gray-900">
      {/* Slides */}
      {slides.map((collection, index) => (
        <div
          key={collection.id}
          className={`absolute inset-0 transition-opacity duration-1000 ${
            index === currentSlide ? 'opacity-100' : 'opacity-0'
          }`}
        >
          {/* Overlay gradient */}
          <div className="absolute inset-0 bg-gradient-to-r from-teal-900/80 via-teal-900/60 to-pink-900/60 z-10" />

          {/* Background Image */}
          <img
            src={collection.image || '/images/placeholder-banner.jpg'}
            alt={collection.name}
            className="w-full h-full object-cover"
          />

          {/* Content */}
          <div className="absolute inset-0 z-20 flex items-center">
            <div className="container mx-auto px-4 sm:px-6 lg:px-8">
              <div className="max-w-2xl">
                {/* Badge */}
                <span className="inline-flex items-center gap-2 bg-gradient-to-r from-teal-400 to-pink-400 text-white px-5 py-2 rounded-full text-sm font-semibold mb-4 shadow-lg">
                  <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                  </svg>
                  Coleção Especial
                </span>

                {/* Title */}
                <h2 className="text-4xl md:text-6xl font-bold text-white mb-4 leading-tight">{collection.name}</h2>

                {/* Description */}
                <p className="text-xl text-gray-100 mb-8">
                  {collection.description || 'Deixe sua festa ainda mais especial com nossa coleção exclusiva'}
                </p>

                {/* CTA Button */}
                <Link
                  href={`/colecoes/${collection.slug}`}
                  className="inline-flex items-center gap-2 bg-gradient-to-r from-teal-400 to-teal-500 text-white px-8 py-4 rounded-lg font-semibold hover:from-teal-500 hover:to-teal-600 transition shadow-xl transform hover:scale-105"
                >
                  Ver Coleção
                  <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 8l4 4m0 0l-4 4m4-4H3" />
                  </svg>
                </Link>
              </div>
            </div>
          </div>
        </div>
      ))}

      {/* Navigation Arrows */}
      {slides.length > 1 && (
        <>
          <button
            onClick={prevSlide}
            className="absolute left-4 top-1/2 -translate-y-1/2 z-30 bg-white/90 hover:bg-white p-3 rounded-full transition shadow-lg group"
            aria-label="Anterior"
          >
            <svg
              className="w-6 h-6 text-gray-800 group-hover:text-teal-600"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 19l-7-7 7-7" />
            </svg>
          </button>

          <button
            onClick={nextSlide}
            className="absolute right-4 top-1/2 -translate-y-1/2 z-30 bg-white/90 hover:bg-white p-3 rounded-full transition shadow-lg group"
            aria-label="Próximo"
          >
            <svg
              className="w-6 h-6 text-gray-800 group-hover:text-teal-600"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </>
      )}

      {/* Dots Indicator */}
      {slides.length > 1 && (
        <div className="absolute bottom-6 left-1/2 -translate-x-1/2 z-30 flex gap-2">
          {slides.map((_, index) => (
            <button
              key={index}
              onClick={() => goToSlide(index)}
              className={`h-2 rounded-full transition-all ${
                index === currentSlide ? 'bg-white w-8' : 'bg-white/50 w-2 hover:bg-white/75'
              }`}
              aria-label={`Ir para slide ${index + 1}`}
            />
          ))}
        </div>
      )}

      {/* Slide Counter */}
      <div className="absolute bottom-6 right-6 z-30 bg-black/50 text-white px-3 py-1 rounded-full text-sm font-semibold">
        {currentSlide + 1} / {slides.length}
      </div>
    </section>
  );
}
