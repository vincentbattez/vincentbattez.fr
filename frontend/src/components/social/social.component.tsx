import React from 'react';

import './social.component.scss'

export function Social({ className, url, image }: SocialProps) {
  function mouseMove(e:any) {
    const x = e.pageX - e.target.offsetLeft;
    const y = e.pageY - e.target.offsetTop;

    e.target.style.setProperty('--x', `${ x }px`);
    e.target.style.setProperty('--y', `${ y }px`);
  }

  const imageUrl = `${process.env.REACT_APP_BACKEND_URL}${image.url}`;

  return (
    <a
      href={url}
      className={`${className} social`}
      target="_blank"
      rel="noopener noreferrer"
      onMouseMove={mouseMove}
    >
      <img
        className="social__image"
        src={imageUrl}
        alt="o"
      />
    </a>
  );
}

export type SocialProps = {
  url: string
  image: {
    url: string
  }
  className?: string
}
