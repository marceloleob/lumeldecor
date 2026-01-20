import React, { useState } from 'react';
import { Link } from '@inertiajs/react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

export default function Header() {
  const [searchQuery, setSearchQuery] = useState('');

  const handleSearch = (e: React.FormEvent) => {
    e.preventDefault();
    if (searchQuery.trim()) {
      window.location.href = `/produtos?busca=${encodeURIComponent(searchQuery)}`;
    }
  };

  return (
    <div className="bg-gradient-to-r from-teal-400 to-pink-400 text-white">
      <div className="container mx-auto px-4">
        <div className="flex items-center justify-between py-4 gap-4">
          {/* Logo */}
          <Link href="/" className="flex-shrink-0">
            <div className="flex items-center gap-2">
              <div className="text-3xl font-bold text-white">Lumel</div>
              <div className="text-2xl font-light text-white/90">Decor</div>
            </div>
          </Link>

          {/* Search Bar */}
          <form onSubmit={handleSearch} className="flex-1 max-w-2xl">
            <div className="relative">
              <input
                type="text"
                value={searchQuery}
                onChange={(e) => setSearchQuery(e.target.value)}
                placeholder="Procure pelo nome do produto.."
                className="w-full px-4 py-3 pr-12 rounded-lg text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white transition"
              />
              <button
                type="submit"
                className="absolute right-0 top-0 h-full px-4 text-gray-600 hover:text-teal-500 transition"
              >
                <FontAwesomeIcon icon="search" className="w-5 h-5" />
              </button>
            </div>
          </form>

          {/* Right Actions */}
          <div className="flex items-center gap-3">
            {/* WhatsApp */}
            <a
              href="https://wa.me/553195140615"
              target="_blank"
              rel="noopener noreferrer"
              className="hidden lg:flex items-center gap-2 bg-white/20 hover:bg-white/30 px-4 py-2 rounded-lg transition"
            >
              <FontAwesomeIcon icon={['fab', 'whatsapp']} className="w-5 h-5" />
              <span className="font-semibold text-sm">31 99514-0615</span>
            </a>

            {/* Favoritos */}
            <Link href="/favoritos" className="p-2 hover:bg-white/20 rounded-full transition" title="Favoritos">
              <FontAwesomeIcon icon="heart" className="w-6 h-6" />
            </Link>

            {/* Carrinho */}
            <Link href="/carrinho" className="relative p-2 hover:bg-white/20 rounded-full transition" title="Carrinho">
              <FontAwesomeIcon icon="shopping-cart" className="w-6 h-6" />
              {/* Badge de quantidade (exemplo) */}
              <span className="absolute -top-1 -right-1 bg-pink-600 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                0
              </span>
            </Link>

            {/* User Menu */}
            <Link href="/login" className="p-2 hover:bg-white/20 rounded-full transition" title="Minha Conta">
              <FontAwesomeIcon icon="user" className="w-6 h-6" />
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
}
