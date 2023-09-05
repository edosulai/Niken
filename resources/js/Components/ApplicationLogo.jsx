import { asset } from '@/Hooks/useHelpers';

export default function ApplicationLogo({ className }) {

    return (
        <img className={className} src={asset('storage/images/logo.jpg')} alt="" srcset="" />
    );
}
