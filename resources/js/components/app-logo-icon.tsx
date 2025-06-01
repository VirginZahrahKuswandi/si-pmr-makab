import { ImgHTMLAttributes } from 'react';

export default function AppLogoIcon(props: ImgHTMLAttributes<HTMLImageElement>) {
    return <img src="/img/logo-makab.jpg" alt="Logo Makab" {...props} />;
}
