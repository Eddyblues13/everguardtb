@include("home.header")
<div class="l-content-wrap u-cf">
    <div class="l-1-col-master u-cf">
        <main class="l-content-primary">
            <div class='body-content js-body-content'>

                <!-- Simple Hero Section -->
                <section class='main-hero main-hero--contact' aria-label="Contact Us"
                    style="padding: 2rem 0; background: #f8f9fa;">
                    <div class="l-contain">
                        <h1 style="margin-bottom: 0.5rem;">Contact Everguard Trust Bank</h1>
                        <p>Reach us through these channels</p>
                    </div>
                </section>

                <!-- Contact Details Section -->
                <section class="l-contain" style="padding: 2rem 0;">
                    <div class="grid-x grid-margin-x">
                        <!-- Contact Methods Column -->
                        <div class="cell small-12 medium-6" style="margin-bottom: 2rem;">
                            <div
                                style="background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); height: 100%;">
                                <h2 style="margin-top: 0; padding-bottom: 0.5rem; border-bottom: 1px solid #eee;">
                                    Contact Methods</h2>

                                <div style="display: flex; align-items: center; margin: 1rem 0;">

                                    <div>
                                        <h3 style="margin: 0 0 0.25rem 0; font-size: 1rem;">Email</h3>
                                        <p style="margin: 0;"><a href="mailto:support@everguardtb.com"
                                                style="color: #0066cc;">support@everguardtb.com</a></p>
                                    </div>
                                </div>

                                <div style="display: flex; align-items: center; margin: 1rem 0;">

                                    <div>
                                        <h3 style="margin: 0 0 0.25rem 0; font-size: 1rem;">WhatsApp</h3>
                                        <p style="margin: 0;"><a href="https://wa.me/+17693490491"
                                                style="color: #0066cc;">+1 (769) 349‑0491</a></p>
                                    </div>
                                </div>




                            </div>
                        </div>

                        <!-- Locations Column -->
                        <div class="cell small-12 medium-6">
                            <div
                                style="background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); height: 100%;">
                                <h2 style="margin-top: 0; padding-bottom: 0.5rem; border-bottom: 1px solid #eee;">Our
                                    Locations</h2>

                                <!-- Raleigh Location -->
                                <div style="margin-bottom: 1.5rem;">
                                    <h3 style="margin: 0 0 0.5rem 0;">Raleigh Office</h3>
                                    <address style="margin: 0 0 0.5rem 0; font-style: normal;">
                                        239 Fayetteville St.<br>
                                        Raleigh, NC 27601<br>
                                        United States
                                    </address>
                                    <p style="margin: 0 0 0.5rem 0;"><strong>Hours:</strong><br>
                                        Mon-Thurs: 8:30am-5pm<br>
                                        Friday: 8:30am-6pm<br>
                                        Saturday: 9am-1pm</p>
                                    <a href="https://maps.google.com?q=239+Fayetteville+St.+Raleigh+NC+27601"
                                        target="_blank"
                                        style="display: inline-block; padding: 0.5rem 1rem; background: #0066cc; color: white; text-decoration: none; border-radius: 4px;">View
                                        on Map</a>
                                </div>

                                <!-- Odessa Location -->
                                <div>
                                    <h3 style="margin: 1.5rem 0 0.5rem 0;">Odessa Office</h3>
                                    <address style="margin: 0 0 0.5rem 0; font-style: normal;">
                                        4031 E 42nd St<br>
                                        Odessa, TX 79762<br>
                                        United States
                                    </address>
                                    <p style="margin: 0 0 0.5rem 0;"><strong>Hours:</strong><br>
                                        Mon-Thurs: 8:30am-5pm<br>
                                        Friday: 8:30am-6pm<br>
                                        Saturday: 9am-1pm</p>
                                    <a href="https://maps.google.com?q=4031+E+42nd+St+Odessa+TX+79762" target="_blank"
                                        style="display: inline-block; padding: 0.5rem 1rem; background: #0066cc; color: white; text-decoration: none; border-radius: 4px;">View
                                        on Map</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </main>
    </div>
</div>

@include("home.footer")

<style>
    /* Responsive adjustments */
    @media (max-width: 639px) {
        .grid-x.grid-margin-x>.cell {
            width: 100% !important;
            margin-left: 0 !important;
        }

        section.l-contain {
            padding: 1rem !important;
        }

        .main-hero--contact {
            padding: 1.5rem 1rem !important;
        }

        .main-hero--contact h1 {
            font-size: 1.5rem !important;
        }
    }
</style>