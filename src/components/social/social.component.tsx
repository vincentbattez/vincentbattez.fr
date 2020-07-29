import React from 'react';

import './social.component.scss'

export function Social({ className, url, image, social }: SocialProps) {
  function mouseMove(e:any) {
    const x = e.pageX - e.target.offsetLeft;
    const y = e.pageY - e.target.offsetTop;

    e.target.style.setProperty('--x', `${ x }px`);
    e.target.style.setProperty('--y', `${ y }px`);
  }

  function clickOnSocial(): void {
    window.$googleAnalytics.event({
      category: 'Social',
      action: social,
    });
  }

  return (
    <a
      href={url}
      className={`${className} social`}
      target="_blank"
      rel="noopener noreferrer"
      onMouseMove={mouseMove}
      onClick={clickOnSocial}
    >
      <img
        className="social__image"
        src={image.url}
        alt=""
      />
    </a>
  );
}

export type SocialProps = {
  social: string,
  url: string
  image: {
    url: string
  }
  className?: string
}
